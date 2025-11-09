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
    ];


    public function updates()
    {
        return $this->hasMany(ShipmentUpdate::class)->orderBy('created_at', 'desc');
    }
}
