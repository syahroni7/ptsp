<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use Illuminate\Support\Facades\Http;

class ReadQuran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'read:quran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify to read Qur\'an';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = \App\Models\User::get();

        $img_url = "http://res.cloudinary.com/kemenagpessel/image/upload/v1679931788/arsip_masuk/fl0hkd7bulf3rq3ypdsl.png";

        // $text = '=== Daily Reminder ===. \n';
        // $text .= '.==== KemenagPessel ====. \n \n ```';

        // $text .= 'Sudahkah Bapak / Ibu membaca Al-Qur\'an hari ini? \n \n';
        // $text .= 'Dan orang yang membaca Al-Qur’an, sedang ia masih terbata-bata lagi berat dalam membacanya, maka ia akan mendapatkan dua pahala. \n \n';

        // $text .= 'Jika sudah, silahkan mengisi Form yang sudah disediakan di bawah ini dan akan di Share Laporannya setiap minggu di hari Senin. \n \n';
        // $text .= 'Terima Kasih atas perhatiannya.';
        // $text .= '\n \n';
        // $text .= 'Link SEHAT-QU (SETIAP HARI TADARUS AL-QURAN \n \n';
        // $text .= 'https://bit.ly/sehat_quran_kemenagpessel';

        $text = '*.:| Daily Reminder - KemenagPessel |:.*

Sudahkah Bapak / Ibu *membaca Al-Qur\'an* hari ini? 

_Dan orang yang membaca Al-Qur’an, sedang ia masih terbata-bata lagi berat dalam membacanya, maka ia akan mendapatkan *dua pahala*. - (HR. Bukhari Muslim)_

Jika sudah, silahkan mengisi *Formulir* yang sudah disediakan di bawah ini dan akan di Share Laporannya setiap minggu di hari Senin.
Terima Kasih atas perhatiannya.

Link Formulir *SEHAT-QU* (SETIAP HARI TADARUS AL-QURAN):
https://bit.ly/sehat_quran_kemenagpessel

_#Kerjasama_Kolektifitas_Komitmen_';


        foreach ($users as $key => $user) {
            $to = $user->no_hp;
            \App\Http\Controllers\MessageController::sendMessageWithImage($to, $text, $img_url);
        }
    }
}
