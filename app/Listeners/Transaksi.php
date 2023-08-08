<?php

namespace App\Listeners;

use App\Events\PaymentSoEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Transaksi
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PaymentSoEvent $event): void
    {
        $paymentSo = $event->getPayment();
        Transaksi::create([
            'id_payment_so' => $paymentSo->id_payment_so,
            'id_verifikasi' => $paymentSo->id_verifikasi,
            'id_so' => $paymentSo->id_so,
        ]);
    }
}
