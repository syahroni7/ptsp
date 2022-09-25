<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Pramana Yuda Sayeti, S.Kom',
                'username' => '199407292022031002',
                'email' => 'pramanayuda772@gmail.com',
                'password' => Hash::make('superadmin'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'H. Abrar Munanda, M.Ag',
                'username' => '197105141995031001',
                'email' => 'abrar.munanda@gmail.com',
                'password' => Hash::make('197105141995031001'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Yossef Yuda, S.HI, MA',
                'username' => '198008042005011007',
                'email' => 'yossef.yuda@gmail.com',
                'password' => Hash::make('198008042005011007'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sudirman, S.Ag',
                'username' => '197202112003121003',
                'email' => 'sudirman@gmail.com',
                'password' => Hash::make('197202112003121003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Masrizal, S.Ag, M.Pd',
                'username' => '197202051997031003',
                'email' => 'masrizal@gmail.com',
                'password' => Hash::make('197202051997031003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Drs. Firdaus',
                'username' => '196706191994031004',
                'email' => 'firdaus@gmail.com',
                'password' => Hash::make('196706191994031004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sumardi, S.Ag, M.Pd',
                'username' => '197107051998031013',
                'email' => 'sumardi@gmail.com',
                'password' => Hash::make('197107051998031013'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Betriadi, S.HI',
                'username' => '198106122008011013',
                'email' => 'betriadi@gmail.com',
                'password' => Hash::make('198106122008011013'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gustiwarni, S.Ag',
                'username' => '196906151996032002',
                'email' => 'gustiwarni@gmail.com',
                'password' => Hash::make('196906151996032002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mardiyana',
                'username' => 'mardiyana',
                'email' => 'mardiyana@gmail.com',
                'password' => Hash::make('operator'),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ];


        DB::table('users')->insert($data);


        $units = [
            [
                'name' => 'Subbagian Tata Usaha',
            ],
            [
                'name' => 'Seksi Pendidikan Madrasah',
            ], 
            [
                'name' => 'Seksi Pendidikan Agama Islam',
            ], 
            [
                'name' => 'Seksi Pendidikan Diniyah dan Pondok Pesantren',
            ], 
            [
                'name' => 'Seksi Penyelenggaraan Haji dan Umrah',
            ],
            [
                'name' => 'Seksi Bimbingan Masyarakat Islam',
            ], 
            [
                'name' => 'Seksi Penyelenggara Syariah Zakat dan Wakaf',
            ]
        ];


        DB::table('daftar_unit_pengolah')->insert($units);


        $jenises = [
            [
                'name' => 'Layanan Surat Keterangan',
            ],
            [
                'name' => 'Layanan Perizinan',
            ], 
            [
                'name' => 'Layanan Pendaftaran',
            ], 
            [
                'name' => 'Layanan Pengesahan',
            ], 
            [
                'name' => 'Layanan Pencatatan',
            ],
            [
                'name' => 'Layanan Rekomendasi',
            ], 
            [
                'name' => 'Layanan Persetujuan',
            ],
            [
                'name' => 'Layanan Penunjukan',
            ],
            [
                'name' => 'Layanan Konsultasi',
            ],
            [
                'name' => 'Layanan Data/Informasi',
            ],
            [
                'name' => 'Layanan Pengaduan',
            ],
            [
                'name' => 'Layanan Persyaratan Kafilah',
            ],
            [
                'name' => 'Layanan Surat Masuk',
            ],
            [
                'name' => 'Layanan Bantuan Operasional Sekolah',
            ],
            [
                'name' => 'Layanan BOP RA',
            ],
            [
                'name' => 'Layanan Program Indonesia Pintar',
            ],
            [
                'name' => 'Layanan PTK',
            ],
            [
                'name' => 'Layanan Bantuan',
            ],
            [
                'name' => 'Layanan Perbaikan Data CJH',
            ],
            [
                'name' => 'Layanan Kenaikan Pangkat',
            ],
            [
                'name' => 'Layanan Mutasi',
            ],
            [
                'name' => 'Layanan Penerbitan SK GTT',
            ],
            [
                'name' => 'Layanan Penerbitan SK Honorer',
            ],
            [
                'name' => 'Layanan Persetujuan Pindah',
            ],
            [
                'name' => 'Layanan Pensiun',
            ],
            [
                'name' => 'Layanan Penghargaan (Satya Lancana Karya Satya)',
            ],
            [
                'name' => 'Permohonan Pengajuan GUP/TUP',
            ],
        ];


        DB::table('daftar_jenis_layanan')->insert($jenises);



        $outputs = [
            [
                'name' => 'Surat Rekomendasi',
            ],
            [
                'name' => 'Surat Izin',
            ],
            [
                'name' => 'Surat Keterangan',
            ]
        ];

        DB::table('daftar_output_layanan')->insert($outputs);



        $layanans = [
            [
                'name' => 'Rekomendasi Pembuatan Paspor Haji',
                'id_unit_pengolah' => 5,
                'id_jenis_layanan' => 6,
                'id_output_layanan' => 1,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Rekomendasi Pembuatan Paspor Umrah',
                'id_unit_pengolah' => 5,
                'id_jenis_layanan' => 6,
                'id_output_layanan' => 1,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Pembatalan Haji (Berangkat)',
                'id_unit_pengolah' => 5,
                'id_jenis_layanan' => 6,
                'id_output_layanan' => 3,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Pembatalan Haji (Meninggal Dunia)',
                'id_unit_pengolah' => 5,
                'id_jenis_layanan' => 6,
                'id_output_layanan' => 3,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
        ];

        DB::table('daftar_layanan')->insert($layanans);



        $syarats = [
            [
                'name' => 'Fotocopy KTP (2 Lembar)',
            ],
            [
                'name' => 'Fotocopy Kartu Keluarga (2 lembar)',
            ],
            [
                'name' => 'Fotocopy Surat/Akte Kelahiran/Ijazah /Nikah (2 Lembar)',
            ],
            [
                'name' => 'Surat Rekomendasi Pembuatan Paspor Umrah Asli dari Travel',
            ]
        ];

        DB::table('master_syarat_layanan')->insert($syarats);


        $daftarSyarats = [
            [
                'id_layanan' => 1,
                'id_master_syarat_layanan' => 1,
            ],
            [
                'id_layanan' => 1,
                'id_master_syarat_layanan' => 2,
            ],
            [
                'id_layanan' => 1,
                'id_master_syarat_layanan' => 3,
            ],
            [
                'id_layanan' => 2,
                'id_master_syarat_layanan' => 1,
            ],
            [
                'id_layanan' => 2,
                'id_master_syarat_layanan' => 2,
            ],
            [
                'id_layanan' => 2,
                'id_master_syarat_layanan' => 3,
            ],
            [
                'id_layanan' => 2,
                'id_master_syarat_layanan' => 4
            ]
            
        ];

        DB::table('daftar_syarat_layanan')->insert($daftarSyarats);


    }
}
