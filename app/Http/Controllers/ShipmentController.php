<?php

namespace App\Http\Controllers;

use App\Mail\ShipmentReceipt;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    /**
     * Show form to create a new shipment
     */
    public function createShipment()
    {
        return view('admin.shipments.create-shipment');
    }

    /**
     * Store a new shipment
     */
    public function store(Request $request)
    {
        $shipment = Shipment::create([
            'sender_name'       => $request->sender_name,
            'sender_phone'      => $request->sender_phone,
            'sender_address'    => $request->sender_address,
            'sender_city'       => $request->sender_city,
            'recipient_name'    => $request->recipient_name,
            'recipient_phone'   => $request->recipient_phone,
            'recipient_address' => $request->recipient_address,
            'recipient_city'    => $request->recipient_city,
            'package_type'      => $request->package_type,
            'tracking_number'   => 'TRK-' . strtoupper(Str::random(10)),
        ]);

        // Optionally send receipt email
        // if (!empty($request->recipient_email)) {
        //     Mail::to($request->recipient_email)->send(new ShipmentReceipt($shipment));
        // }

        return redirect()
            ->back()
            ->with('success', 'Shipment created successfully')
            ->with('tracking', $shipment->tracking_number);
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

        return view('shipments.track-shipment', compact('shipment'));
    }


    private function processShipmentUpdate(Request $request, Shipment $shipment): void
    {
        $shipment->updates()->create([
            'status'      => $request->status,
            'location'    => $request->location,
            'description' => $request->description,
        ]);

        $shipment->update([
            'status'           => $request->status,
            'current_location' => $request->location,
        ]);
    }

    /**
     * Update shipment status (used in admin dashboard)
     */
    public function updateShipmentStatus(Request $request, $id)
    {
        $request->validate([
            'status'      => 'required|string|max:100',
            'location'    => 'required|string|max:150',
            'description' => 'nullable|string|max:255',
        ]);

        $shipment = Shipment::findOrFail($id);

        $this->processShipmentUpdate($request, $shipment);

        return redirect()->back()->with('success', 'Shipment status updated successfully.');
    }

    /**
     * Store update (for edit page)
     */
    public function storeUpdate(Request $request, $id)
    {
        $request->validate([
            'status'      => 'required|string|max:150',
            'location'    => 'required|string|max:150',
            'description' => 'nullable|string|max:400',
        ]);

        $shipment = Shipment::findOrFail($id);

        $this->processShipmentUpdate($request, $shipment);

        return redirect()->back()->with('success', 'Shipment status successfully updated.');
    }

    /**
     * List all shipments
     */
    public function shipmentList(Request $request)
    {
        $shipments = Shipment::latest()->paginate(20);
        return view('admin.shipments.shipment-list', compact('shipments'));
    }

    /**
     * Show shipment details
     */
    public function shipmentDetails($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.shipment-details', compact('shipment'));
    }

    /**
     * Show edit form for a shipment
     */
    public function editShipment($id)
    {
        $shipment = Shipment::with('updates')->findOrFail($id);
        return view('admin.shipments.edit-shipment', compact('shipment'));
    }

    /**
     * Show update form for a shipment
     */
    public function showUpdateForm($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.update-shipment', compact('shipment'));
    }
}
