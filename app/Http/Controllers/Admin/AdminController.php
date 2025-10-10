<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except(['index']);
    }

    public function index()
    {
        return view('admin.index');
    }

    public function admin_dashboard()
    {
        $user = auth()->user();

        // Total Shipments 
        $totalShipments = Shipment::where('user_id', $user->id)->count();

        // Delivered 
        $delivered = Shipment::where('user_id', $user->id)
            ->where('status', 'Delivered')
            ->count();

        // Pending 
        $pending = Shipment::where('user_id', $user->id)
            ->where('status', 'Pending')
            ->count();

        $inTransit = Shipment::where('user_id', $user->id)
            ->where('status', 'In Tansit')
            ->count();

        // Recent 
        $recentShipments = Shipment::where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        // Percentages
        $deliveredPercentage = $totalShipments > 0
            ? round(($delivered / $totalShipments) * 100, 2)
            : 0;

        $pendingPercentage = $totalShipments > 0
            ? round(($pending / $totalShipments) * 100, 2)
            : 0;

        $inTransitPercentage = $totalShipments > 0
            ? round(($pending / $totalShipments) * 100, 2)
            : 0;


        return view('admin.dashboard', compact(
            'totalShipments',
            'delivered',
            'pending',
            'inTransit',
            'deliveredPercentage',
            'pendingPercentage',
            'inTransitPercentage',
            'recentShipments',
            'user'
        ));
    }
}
