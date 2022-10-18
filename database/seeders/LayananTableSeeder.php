<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Log;

class LayananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filename = 'Data Layanan.xlsx';
        $toPath = public_path('/' . $filename);

        $excel = \Excel::toArray([], $toPath);

        $sheet = 0;
        $row = 1;

        $sheet = $excel[$sheet];
        $dataLayanan = [];

        foreach ($sheet as $row => $value) {
            if ($row > 1) {
                $namaL = $value[1];
                $unitL = $value[2];
                $jenisL = $value[3];
                $outputL = $value[4];
                $lamaL = $value[5];
                $biayaL = $value[6];

                $unit = \App\Models\UnitPengolah::firstOrCreate(['name' =>  $unitL]);
                $jenis = \App\Models\JenisLayanan::firstOrCreate(['name' =>  $jenisL]);
                $output = \App\Models\OutputLayanan::firstOrCreate(['name' =>  $outputL]);

                $dataLayanan[] = [
                    'name' => $namaL,
                    'id_unit_pengolah' => $unit->id_unit_pengolah,
                    'id_jenis_layanan' => $jenis->id_jenis_layanan,
                    'id_output_layanan' => $output->id_output_layanan,
                    'lama_layanan' => $lamaL,
                    'biaya_layanan' => $biayaL,
                ];
            }
        }

        \App\Models\DaftarLayanan::insert($dataLayanan);

        Log::info('Insert Layanan Selesai');
    }
}
