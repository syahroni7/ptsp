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
            [ #1
                'name' => 'permohonan_baru'
            ],
            [ #2
                'name' => 'mohon_arahan'
            ],
            [ #3
                'name' => 'mohon_diedarkan',
            ],
            [ #4
                'name' => 'mohon_diselesaikan',
            ], 
            [ #5
                'name' => 'mohon_diperiksa_atau_ditelaah',
            ],
            [ #6
                'name' => 'untuk_ditindaklanjuti',
            ],
            [ #7
                'name' => 'untuk_diproses',
            ],
            [ #8
                'name' => 'untuk_diwakili',
            ],
            [ #9
                'name' => 'untuk_kita_hadiri_bersama',
            ],
            [ #10
                'name' => 'untuk_dihadiri',
            ],
            [ #11
                'name' => 'untuk_diarsipkan',
            ],
            [ #12
                'name' => 'untuk_kita_bicarakan',
            ],
            [ #13
                'name' => 'untuk_diketahui',
            ]
        ];

        DB::table('master_aksi_disposisi')->insert($aksis);
    }
}
