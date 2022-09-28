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
                'name' => 'ditindaklanjuti',
            ],
            [
                'name' => 'untuk_diedarkan',
            ],
            [
                'name' => 'untuk_diketahui',
            ],
            [
                'name' => 'diperiksa_atau_ditelaah',
            ],
            [
                'name' => 'agar_dijawab',
            ],
            [
                'name' => 'saran_atau_tanggapan',
            ],
            [
                'name' => 'agar_diselesaikan',
            ]
        ];

        DB::table('master_aksi_disposisi')->insert($aksis);
    }
}
