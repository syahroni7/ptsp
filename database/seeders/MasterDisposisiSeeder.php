<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MasterDisposisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Mohon Arahan
        // Mohon Petunjuk
        // Mohon Diwakilkan
        // Mohon Diproses
        // Mohon Pertimbangan
        // Mohon Ditindaklanjuti
        // Mohon Ditelaah
        $aksis = [
            [
                'name' => 'arsip',
            ],
            [
                'name' => 'dimonitor',
            ],
            [
                'name' => 'kita_bicarakan',
            ],
            [
                'name' => 'mohon_ditindaklanjuti',
            ],
            [
                'name' => 'mohon_diedarkan',
            ],
            [
                'name' => 'mohon_diketahui',
            ],
            [
                'name' => 'mohon_diperiksa_atau_ditelaah',
            ],
            [
                'name' => 'mohon_dijawab',
            ],
            [
                'name' => 'saran_atau_tanggapan',
            ],
            [
                'name' => 'mohon_diselesaikan',
            ]
        ];

        DB::table('master_aksi_disposisi')->insert($aksis);
    }
}
