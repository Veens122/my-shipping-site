<?php

namespace App\Http\Controllers;

use App\Mail\ShipmentReceipt;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ShipmentController extends Controller
{
    //

    public function createShipment()
    {
        return view('admin.shipments.create-shipment');
    }

    public function store(Request $request)
    {
        $shipment = Shipment::create([
            'sender_name'      => $request->sender_name,
            'sender_phone'     => $request->sender_phone,
            'sender_address'   => $request->sender_address,
            'sender_city'      => $request->sender_city,
            'recipient_name'   => $request->recipient_name,
            'recipient_phone'  => $request->recipient_phone,
            'recipient_address' => $request->recipient_address,
            'recipient_city'   => $request->recipient_city,
            'package_type'     => $request->package_type,
            'tracking_number'  => 'TRK-' . strtoupper(uniqid()),
        ]);

        return redirect()
            ->back()
            ->with('success', 'Shipment created successfully')
            ->with('tracking', $shipment->tracking_number);
    }

    public function showTrackingForm()
    {
        return view('track');
    }

    // TRACK SHIPMENT
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
            return redirect()->back()->with('error', 'No shipment found with tracking number: ' . $tracking_number);
        }

        // Redirect to GET route instead of returning view directly
        return redirect()->route('track.result', ['tracking_number' => $tracking_number]);
    }

    public function showResult($tracking_number)
    {
        $shipment = Shipment::where('tracking_number', $tracking_number)
            ->with('updates')
            ->first();

        if (!$shipment) {
            return redirect('/')->with('error', 'No shipment found with tracking number: ' . $tracking_number);
        }

        return view('shipments.track-shipment', compact('shipment'));
    }



    // Update Shipment Status
    public function updateShipmentStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:100',
            'location' => 'required|string|max:150',
            'description' => 'nullable|string|max:255',
        ]);

        $shipment = Shipment::findOrFail($id);

        $shipment->updates()->create([
            'status' => $request->status,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        $shipment->update([
            'status' => $request->status,
            'current_location' => $request->location,
        ]);


        return redirect()->back()->with('success', 'Shipment status updates scuccessfully.');
    }

    public function shipmentList(Request $request)
    {
        $shipments = Shipment::latest()->get();
        return view('admin.shipments.shipment-list', compact('shipments'));
    }

    public function shipmentDetails($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.shipment-details', compact('shipment'));
    }

    public function editShipment($id)
    {
        $shipment = Shipment::with('updates')->findOrFail($id);

        return view('admin.shipments.edit-shipment', compact('shipment'));
    }

    public function showUpdateForm($id)
    {
        $shipment = Shipment::findOrFail($id);
        return view('admin.shipments.update-shipment', compact('shipment'));
    }

    public function storeUpdate(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|max:150',
            'location' => 'required|string|max:150',
            'description' => 'nullable|string|max:400',
        ]);

        $shipment = Shipment::findOrFail($id);

        $shipment->updates()->create([
            'status' => $request->status,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        $shipment->update([
            'status' => $request->status,
            'current_location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Shipment status successfully updated.');
    }
}
