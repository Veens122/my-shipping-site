<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tracking_number',
        'sender_name',
        'sender_phone',
        'sender_address',
        'sender_city',
        'recipient_name',
        'recipient_phone',
        'recipient_address',
        'recipient_city',
        'package_type',
        'package_description',
        'registered_date',
        'arrival_date',
        'shipping_fee',
        'current_location',
        'status',
        'user_id',
        'order_received_date',
        'handed_to_carrier_date',
        'in_transit_date',
        'out_for_delivery_date',
        'delivered_date',
    ];

    // Cast date fields to Carbon instances
    protected $casts = [
        'registered_date'        => 'datetime',
        'arrival_date'           => 'datetime',
        'order_received_date'    => 'datetime',
        'handed_to_carrier_date' => 'datetime',
        'in_transit_date'        => 'datetime',
        'out_for_delivery_date'  => 'datetime',
        'delivered_date'         => 'datetime',
    ];

    public function updates()
    {
        return $this->hasMany(ShipmentUpdate::class)->orderBy('created_at', 'desc');
    }
}
