<?php

namespace App\Http\Controllers;

use App\Mail\ShipmentReceipt;
use App\Models\Shipment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Writer;




class ShipmentController extends Controller
{
    /**
     * Show form to create a new shipment
     */
    public function createShipment()
    {
        return view('admin.shipments.create-shipment');
    }


    public function store(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'sender_name'        => 'required|string|max:255',
            'sender_phone'       => 'required|string|max:20',
            'sender_address'     => 'required|string|max:500',
            'sender_city'        => 'required|string|max:100',
            'recipient_name'     => 'required|string|max:255',
            'recipient_phone'    => 'required|string|max:20',
            'recipient_address'  => 'required|string|max:500',
            'recipient_city'     => 'required|string|max:100',
            'package_type'       => 'required|string|max:100',
            'package_description' => 'nullable|string|max:1000',
            'registered_date'    => 'required|date',
            'arrival_date'       => 'required|date|after_or_equal:registered_date',
            'shipping_fee'       => 'required|numeric|min:0',
        ]);

        // Generate a unique tracking number
        $trackingNumber = 'TRK' . time();

        // Get coordinates for sender city
        $coords = $this->getCoordinates($validated['sender_city']);

        // Create shipment record
        $shipment = Shipment::create([
            'tracking_number'    => $trackingNumber,
            'user_id'            => auth()->id(),
            'sender_name'        => $validated['sender_name'],
            'sender_phone'       => $validated['sender_phone'],
            'sender_address'     => $validated['sender_address'],
            'sender_city'        => $validated['sender_city'],
            'recipient_name'     => $validated['recipient_name'],
            'recipient_phone'    => $validated['recipient_phone'],
            'recipient_address'  => $validated['recipient_address'],
            'recipient_city'     => $validated['recipient_city'],
            'package_type'       => $validated['package_type'],
            'package_description' => $validated['package_description'] ?? null,
            'registered_date'    => $validated['registered_date'],
            'arrival_date'       => $validated['arrival_date'],
            'shipping_fee'       => $validated['shipping_fee'],
            'status'             => 'Registered',
            'current_location'   => $validated['sender_city'],
            'latitude'           => $coords['lat'] ?? null,
            'longitude'          => $coords['lng'] ?? null,
        ]);

        // Generate shipment receipt PDF
        $pdf = Pdf::loadView('shipments.receipt', compact('shipment'));

        // Ensure receipts directory exists
        $directory = 'receipts';
        if (!Storage::disk('public')->exists($directory)) {
            Storage::disk('public')->makeDirectory($directory);
        }

        // Save receipt PDF
        $fileName = "{$directory}/receipt_{$shipment->tracking_number}.pdf";
        $pdf->save(storage_path("app/public/{$fileName}"));

        // Save file path to database
        $shipment->update(['receipt_path' => $fileName]);

        // Redirect with success message
        return redirect()->route('shipments.shipment-list')
            ->with([
                'success' => 'Shipment registered successfully! Receipt generated.',
                'receiptPreview' => asset('storage/' . $fileName),
                'downloadUrl' => asset('storage/' . $fileName),
            ]);
    }



    // Edit Shipment
    public function editShipment($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.edit-shipment', compact('shipment'));
    }

    // Update Shipment
    public function updateShipmentEdit(Request $request, $id)
    {
        $validated = $request->validate([
            'sender_name'        => 'required|string|max:255',
            'sender_phone'       => 'required|string|max:20',
            'sender_address'     => 'required|string|max:500',
            'sender_city'        => 'required|string|max:100',
            'recipient_name'     => 'required|string|max:255',
            'recipient_phone'    => 'required|string|max:20',
            'recipient_address'  => 'required|string|max:500',
            'recipient_city'     => 'required|string|max:100',
            'package_type'       => 'required|string|max:100',
            'package_description' => 'nullable|string|max:1000',
            'registered_date'    => 'required|date',
            'arrival_date'       => 'required|date|after_or_equal:registered_date',
            'shipping_fee'       => 'required|numeric|min:0',

            // Optional updates
            'transit_date'       => $request->transit_date ?? now(),
            'delivered_date'     => $request->delivered_date ?? now(),
            'received_date'      => $request->received_date ?? now(),
        ]);

        $shipment = Shipment::findOrFail($id);
        $shipment->update($validated);

        return redirect()->route('shipments.shipment-details', $shipment->id)
            ->with('success', 'Shipment successfully updated.');
    }




    // Delete shipment
    public function destroy($id)
    {
        $shipment = Shipment::findOrFail($id);
        $shipment->delete();

        return redirect()->route('shipments.shipment-list')->with('success', 'Shipment deleted successfully.');
    }



    public function downloadReceipt($id)
    {
        try {
            $shipment = Shipment::findOrFail($id);

            $pdf = Pdf::loadView('shipments.receipt', compact('shipment'))
                ->setPaper('a4', 'portrait')
                ->setOption('dpi', 96)
                ->setOption('defaultFont', 'DejaVu Sans')
                ->setOption('isHtml5ParserEnabled', true)
                ->setOption('isRemoteEnabled', false)
                ->setOption('isPhpEnabled', false);

            return $pdf->download('shipment-receipt-' . $shipment->tracking_number . '.pdf');
        } catch (\Exception $e) {
            \Log::error('PDF Generation Error: ' . $e->getMessage());
            \log::error('PDF Stack Trace: ' . $e->getTraceAsString());

            // Fallback: redirect to view instead of download
            return redirect()->route('shipments.shipment-list', $shipment->id)
                ->with('error', 'PDF generation failed. Showing HTML version instead.');
        }
    }

    public function showTrackingForm()
    {
        return view('track');
    }


    public function trackShipment(Request $request)
    {
        $request->validate([
            'tracking_number' => 'required|string|max:100',
        ]);

        $tracking_number = $request->tracking_number;

        $shipment = Shipment::where('tracking_number', $tracking_number)
            ->with('updates')
            ->first();

        if (!$shipment) {
            return redirect()->back()->with('error', "No shipment found with tracking number: {$tracking_number}");
        }

        return redirect()->route('track.result', ['tracking_number' => $tracking_number]);
    }

    public function showResult($tracking_number)
    {
        $shipment = Shipment::where('tracking_number', $tracking_number)
            ->with('updates')
            ->first();

        if (!$shipment) {
            return redirect('/')->with('error', "No shipment found with tracking number: {$tracking_number}");
        }

        // Pre-filter updates with coordinates for the JavaScript
        $updatesWithCoords = $shipment->updates->filter(function ($update) {
            return $update->latitude && $update->longitude;
        })->values(); // ensures numeric array

        // If no updates with coordinates, fallback to shipment's initial location
        if ($updatesWithCoords->isEmpty() && $shipment->latitude && $shipment->longitude) {
            $updatesWithCoords = collect([
                [
                    'latitude'   => $shipment->latitude,
                    'longitude'  => $shipment->longitude,
                    'status'     => $shipment->status,
                    'location'   => $shipment->current_location,
                    'created_at' => $shipment->created_at,
                ]
            ])->values();
        }



        return view('shipments.track-shipment', compact('shipment', 'updatesWithCoords'));
    }

    public function updateShipmentStatus(Request $request, Shipment $shipment)
    {
        $request->validate([
            'status'   => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $shipment->status = $request->status;

        // Call helper to get coordinates
        $coords = $this->getCoordinates($request->location);

        if ($coords) {
            $shipment->current_location = $request->location;
            $shipment->latitude = $coords['lat'];
            $shipment->longitude = $coords['lng'];
        }

        $shipment->save();

        return back()->with('success', 'Shipment status & location updated.');
    }


    // Store Update
    public function storeUpdate(Request $request, $id)
    {
        $request->validate([
            'status'      => 'required|string|max:150',
            'location'    => 'required|string|max:150',
            'description' => 'nullable|string|max:400',
            'order_received_date'        => 'nullable|date',
            'handed_to_carrier_date'     => 'nullable|date',
            'in_transit_date'            => 'nullable|date',
            'out_for_delivery_date'      => 'nullable|date',
            'delivered_date'             => 'nullable|date',
        ]);

        $shipment = Shipment::findOrFail($id);

        // Determine which timestamp to use
        $statusDateField = match ($request->status) {
            'Order Received'             => $request->order_received_date,
            'Package Handed to Carrier'  => $request->handed_to_carrier_date,
            'In Transit'                 => $request->in_transit_date,
            'Out for Delivery'           => $request->out_for_delivery_date,
            'Delivered'                  => $request->delivered_date,
            default                      => null,
        };

        $updateTime = $statusDateField ? \Carbon\Carbon::parse($statusDateField) : now();

        $this->processShipmentUpdate($request, $shipment, $updateTime);

        return redirect()->back()->with('success', 'Shipment status successfully updated.');
    }


    // Proccess Shipment
    private function processShipmentUpdate(Request $request, Shipment $shipment, $updateTime = null): void
    {
        // Determine the update timestamp
        $updateTime = $updateTime ?? now();

        // Try OpenCage first
        $coordinates = $this->getCoordinates($request->location);

        // Fallback to Nominatim
        if (!$coordinates) {
            $coordinates = $this->geocodeLocation($request->location);
        }

        // Last fallback: keep the last known coordinates
        if (!$coordinates) {
            $coordinates = [
                'lat' => $shipment->latitude,
                'lng' => $shipment->longitude,
            ];
        }

        // Store in shipment updates
        $shipment->updates()->create([
            'status'      => $request->status,
            'location'    => $request->location,
            'description' => $request->description,
            'latitude'    => $coordinates['lat'] ?? null,
            'longitude'   => $coordinates['lng'] ?? null,
            'status_date' => $updateTime,
            'created_at'  => $updateTime,
            'updated_at'  => $updateTime,
        ]);


        // Prepare main shipment update
        $shipmentData = [
            'status'           => $request->status,
            'current_location' => $request->location,
            'latitude'         => $coordinates['lat'] ?? null,
            'longitude'        => $coordinates['lng'] ?? null,
        ];

        // Map status to shipment date columns


        // Update main shipment table
        $shipment->update($shipmentData);
    }





    public function shipmentList(Request $request)
    {
        $user = auth()->user();
        $totalShipments = Shipment::where('user_id', $user->id)->count();
        $delivered      = Shipment::where('user_id', $user->id)->where('status', 'Delivered')->count();
        $inTransit      = Shipment::where('user_id', $user->id)->where('status', 'In Transit')->count();
        $pending        = Shipment::where('user_id', $user->id)->where('status', 'Pending')->count();

        $shipments = Shipment::where('user_id', $user->id)
            ->latest()
            ->paginate(10);

        // Percentages
        $deliveredPercentage = $totalShipments > 0
            ? round(($delivered / $totalShipments) * 100, 2)
            : 0;

        $pendingPercentage = $totalShipments > 0
            ? round(($pending / $totalShipments) * 100, 2)
            : 0;

        $inTransitPercentage = $totalShipments > 0 ? round(($pending / $totalShipments) * 100, 2) : 0;

        return view('admin.shipments.shipment-list', compact(
            'totalShipments',
            'delivered',
            'inTransit',
            'pending',
            'shipments',
            'deliveredPercentage',
            'pendingPercentage',
            'inTransitPercentage',
            'user',
        ));
    }

    public function shipmentDetails($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.shipment-details', compact('shipment'));
    }


    public function showUpdateForm($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.update-shipment', compact('shipment'));
    }




    private function geocodeLocation($location)
    {
        $userAgent = config('app.nominatim_user_agent', env('NOMINATIM_USER_AGENT', 'Laravel_Shipment_Tracker'));
        $url = "https://nominatim.openstreetmap.org/search?" . http_build_query([
            'q'     => $location,
            'format' => 'json',
            'limit' => 1,
        ]);

        $response = Http::withHeaders([
            'User-Agent' => $userAgent,
        ])->get($url);

        if ($response->ok() && count($response->json()) > 0) {
            $data = $response->json()[0];
            return [
                'lat' => $data['lat'],
                'lng' => $data['lon'], // Nominatim returns 'lon'
            ];
        }

        return null;
    }


    public function getCoordinates($location)
    {
        try {
            // Send request with proper timeout and retry settings
            $response = Http::timeout(15)
                ->retry(3, 2000) // Retry 3 times with 2-second delay
                ->get('https://api.opencagedata.com/geocode/v1/json', [
                    'q'     => $location,
                    'key'   => config('services.opencage.key'),
                    'limit' => 1,
                ]);

            // Check if the response is valid and has coordinates
            if ($response->ok() && isset($response->json()['results'][0]['geometry'])) {
                $coordinates = $response->json()['results'][0]['geometry'];

                return [
                    'lat' => $coordinates['lat'],
                    'lng' => $coordinates['lng'],
                ];
            }

            // Log warning if no valid results are found
            \Log::warning('No coordinates found for location: ' . $location);
            return null;
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            // Handle connection or timeout errors gracefully
            \Log::error('Connection error while fetching coordinates: ' . $e->getMessage());
            return null;
        } catch (\Exception $e) {
            // Handle any unexpected errors
            \Log::error('Unexpected error in getCoordinates: ' . $e->getMessage());
            return null;
        }
    }



    public function downloadLabel($id)
    {
        $shipment = Shipment::findOrFail($id);

        $pdf = Pdf::loadView('shipments.label', compact('shipment'));

        return $pdf->download("label-{$shipment->tracking_number}.pdf");
    }
}
