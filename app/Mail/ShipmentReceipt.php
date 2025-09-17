<?php

namespace App\Mail;

use App\Models\Shipment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShipmentReceipt extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $shipment;

    public function __construct(Shipment $shipment)
    {
        //
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->subject('Shipment Receipt - ' . $this->shipment->tracking_number)->markdown('emails.shipment.receipt');
    }
}
