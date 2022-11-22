<?php

namespace App\Listeners;

use App\Events\DispositionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Log;

class SendWhatsappNotifiation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\DispositionProcessed  $event
     * @return void
     */
    public function handle(DispositionProcessed $event)
    {
        Log::info('=======================================');
        Log::info('Ready For Send Message');

        $detailUrl = route('daftar-pelayanan.detail', $event->pelayanan->idx_pelayanan);
        $text = '```.:= PTSP KEMENAG PESSEL =:. \n';
        $text .= '\n';
        $text .= 'Yth, \n';
        $text .= '' . $event->recipient->name . ' \n';
        $text .= 'Ada Disposisi Baru \n \n';
        $text .= '==========================\n';
        $text .= 'No. Reg : '. $event->pelayanan->no_registrasi.'\n';
        $text .= 'Perihal : '. $event->pelayanan->perihal .'\n';
        $text .= 'Pemohon : '. $event->pelayanan->pemohon_nama .'\n';
        $text .= 'Alamat  : '. $event->pelayanan->pemohon_alamat .'\n';
        $text .= '==========================';
        $text .= '\n \n';
        $text .= 'Rincian Pelayanan dapat dilihat pada link dibawah. \n \n';
        $text .= 'Harap Menyimpan nomor ini dengan Nama KemenagPessel agar dapat klik Link dibawah. ``` \n \n';
        $text .= '' . $detailUrl . '';

        Log::info('Message: ');
        Log::info($text);
        Log::info('=======================================');
        \App\Http\Controllers\MessageController::sendMessage($event->recipient->no_hp, $text);
        Log::info('Messsage Sent');
        Log::info('=======================================');
    }
}
