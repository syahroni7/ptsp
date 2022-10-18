<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Log;

class SyaratLayananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = 'Data Syarat Layanan.xlsx';
        $toPath = public_path('/' . $filename);

        $excel = \Excel::toArray([], $toPath);

        $sheet = 0;
        $row = 1;

        $sheet = $excel[$sheet];

        $syaratLayanan = [];


        foreach ($sheet as $row => $value) {
            if ($row > 1) {
                $namaL = $value[1];
                $syaratL = $value[2];
    
                $syarat = \App\Models\MasterSyaratLayanan::firstOrCreate(['name' =>  $syaratL]);
    
                $syaratLayanan[$namaL][] = $syarat->id_master_syarat_layanan;
            }
        }
    
        foreach($syaratLayanan as $layanan => $arr) {
            $layanan = \App\Models\DaftarLayanan::where('name', $layanan)->first();
            $layanan->syarat()->sync($arr);
        }
    }
}
