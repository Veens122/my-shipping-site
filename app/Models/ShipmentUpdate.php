<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipment_id',
        'location',
        'status',
        'description',
        'latitude',
        'longitude',
    ];

    public function shipment()
    {
        return $this->belongsTo(Shipment::class);
    }

    public function getStatusClassAttribute()
    {
        return match ($this->status) {
            'Picked Up' => 'badge bg-primary',
            'In Transit' => 'badge bg-info',
            'Out for Delivery' => 'badge bg-warning text-dark',
            'Delivered' => 'badge bg-success',
            'Delayed' => 'badge bg-danger',
            default => 'badge bg-secondary',
        };
    }
}
