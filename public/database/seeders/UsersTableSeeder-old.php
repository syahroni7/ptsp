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
                'name' => 'Muhamad Syahroni, S.Kom',
                'username' => '199605222025051001',
                'jabatan' => 'Ahli Pertama - Pranata Komputer',
                'email' => '199605222025051001@kemenag.go.id',
                'password' => Hash::make('superadmin'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Badrusalam, S.Ag.',
                'username' => '196901031991031005',
                'jabatan' => 'Kepala Kantor',
                'email' => 'abrar.munanda@kemenag.go.id',
                'password' => Hash::make('196901031991031005'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ajrum Firdaus, S.Ag',
                'username' => '197010051991031004',
                'jabatan' => 'Kepala Sub Bagian Tata Usaha',
                'email' => '197010051991031004@kemenag.go.id',
                'password' => Hash::make('197010051991031004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sudirman, S.Ag',
                'username' => '197202112003121003',
                'jabatan' => 'Kepala Seksi Pondok Pesantren',
                'email' => '197202112003121003@kemenag.go.id',
                'password' => Hash::make('197202112003121003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Masrizal, S.Ag, M.Pd',
                'username' => '197202051997031003',
                'jabatan' => 'Kepala Seksi Pendidikan Agama Islam',
                'email' => '197202051997031003@kemenag.go.id',
                'password' => Hash::make('197202051997031003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Drs. Firdaus',
                'username' => '196706191994031004',
                'jabatan' => 'Kepala Seksi Bimbingan Masyarakat Islam',
                'email' => '196706191994031004@kemenag.go.id',
                'password' => Hash::make('196706191994031004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sumardi, S.Ag, M.Pd',
                'username' => '197107051998031013',
                'jabatan' => 'Kepala Seksi Pendidikan Madrasah',
                'email' => 'sumardi@kemenag.go.id',
                'password' => Hash::make('197107051998031013'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Betriadi, S.HI',
                'username' => '198106122008011013',
                'jabatan' => 'Kepala Seksi Penyelenggara Haji dan Umrah',
                'email' => '198106122008011013@kemenag.go.id',
                'password' => Hash::make('198106122008011013'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Gustiwarni, S.Ag',
                'username' => '196906151996032002',
                'jabatan' => 'Kepala Seksi Zakat dan Wakaf',
                'email' => '196906151996032002@kemenag.go.id',
                'password' => Hash::make('196906151996032002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Mardiyana, AMD, KKK',
                'username' => 'mardiyana',
                'jabatan' => 'Petugas',
                'email' => 'mardiyana@kemenag.go.id',
                'password' => Hash::make('mardiyana'),
                'updated_at' => \Carbon\Carbon::now()
            ],

            // Umum
            [
            'name' => 'Afrison, S.HI',
                'username' => '197901012007101004',
                'jabatan' => 'Staf',
                'email' => '197901012007101004@kemenag.go.id',
                'password' => Hash::make('197901012007101004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Upik Mike, S.AP',
                'username' => '198505202014122005',
                'jabatan' => 'Staf',
                'email' => '198505202014122005@kemenag.go.id',
                'password' => Hash::make('198505202014122005'),
                'updated_at' => \Carbon\Carbon::now()
            ],

            // Staff Kepegawaian
            [
                'name' => 'Anna Yoladevika, SH',
                'username' => '197505152005012003',
                'jabatan' => 'Staf',
                'email' => '197505152005012003@kemenag.go.id',
                'password' => Hash::make('197505152005012003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Sri Mulyani, SH',
                'username' => '198006222014112002',
                'jabatan' => 'Staf',
                'email' => '198006222014112002@kemenag.go.id',
                'password' => Hash::make('198006222014112002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            // Staff Keuangan
            [
                'name' => 'Yunefri, S.Kom ',
                'username' => '197406142007101001',
                'jabatan' => 'Staf',
                'email' => '197406142007101001@kemenag.go.id',
                'password' => Hash::make('197406142007101001'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Del Junefri, SE',
                'username' => '197606082009121001',
                'jabatan' => 'Staf',
                'email' => '197606082009121001@kemenag.go.id',
                'password' => Hash::make('197606082009121001'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Ramadhanera P Madya, SE',
                'username' => '198705122011012008',
                'jabatan' => 'Staf',
                'email' => '198705122011012008@kemenag.go.id',
                'password' => Hash::make('198705122011012008'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Nila Oksana, A. Ma',
                'username' =>'198210132007102002',
                'jabatan' => 'Staf',
                'email' => '198210132007102002@kemenag.go.id',
                'password' => Hash::make('198210132007102002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Roni Hendra',
                'username' =>'198212152005011002',
                'jabatan' => 'Staf',
                'email' => '198212152005011002@kemenag.go.id',
                'password' => Hash::make('198212152005011002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Asriwansyah',
                'username' =>'198204032005011001',
                'jabatan' => 'Staf',
                'email' => '198204032005011001@kemenag.go.id',
                'password' => Hash::make('198204032005011001'),
                'updated_at' => \Carbon\Carbon::now()
            ],




            // Staff Penmad
            [
                'name' => 'Heru Syafri,A.Ma',
                'username' => '198212262005011004',
                'jabatan' => 'Staf',
                'email' => '198212262005011004@kemenag.go.id',
                'password' => Hash::make('198212262005011004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Meiriza Lidya, S.S',
                'username' => 'Meiriza',
                'jabatan' => 'Staf',
                'email' => 'Meiriza@kemenag.go.id',
                'password' => Hash::make('Meiriza '),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [

                'name' => 'Fauzhi Abdhilah, S.Kom',
                'username' => 'Fauzhi',
                'jabatan' => 'Staf',
                'email' => 'Fauzhi@kemenag.go.id',
                'password' => Hash::make('Fauzhi'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [

                'name' => 'Dewi Martaliza, S.AP',
                'username' => '197903062014122002',
                'jabatan' => 'Staf',
                'email' => '197903062014122002@kemenag.go.id',
                'password' => Hash::make('197903062014122002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            // Staff Haji
            [
                'name' => 'MARDANITA JALPIDA, S.S',
                'username' => '198003162007102002',
                'jabatan' => 'Staf',
                'email' => '198003162007102002@kemenag.go.id',
                'password' => Hash::make('198003162007102002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Liswarti, S.Th I',
                'username' => '198104122009012004',
                'jabatan' => 'Staf',
                'email' => '198104122009012004@kemenag.go.id',
                'password' => Hash::make('198104122009012004'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Martinis, S.Th I',
                'username' => '197101152007102002',
                'jabatan' => 'Staf',
                'email' => '197101152007102002@kemenag.go.id',
                'password' => Hash::make('197101152007102002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            // Staff PAIS
            [
                'name' => 'ENDRIZAL, S.Ag',
                'username' => '197205062007101002',
                'jabatan' => 'Staf',
                'email' => '197205062007101002@kemenag.go.id',
                'password' => Hash::make('197205062007101002'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Syafria Norawati, A.Ma',
                'username' => '198004142007102006',
                'jabatan' => 'Staf',
                'email' => '198004142007102006@kemenag.go.id',
                'password' => Hash::make('19800414 200710 2 006'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            // Staff Bimas
            [
                'name' => 'MARSEHARTI, S.Ag',
                'username' => '197208212000032003',
                'jabatan' => 'Staf',
                'email' => '197208212000032003@kemenag.go.id',
                'password' => Hash::make('197208212000032003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Efnurdawati, S.HI',
                'username' => '197809292005012003',
                'jabatan' => 'Staf',
                'email' => '197809292005012003@kemenag.go.id',
                'password' => Hash::make('197809292005012003'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Afriyasni',
                'username' => '196508281989032001',
                'jabatan' => 'Staf',
                'email' => '196508281989032001@kemenag.go.id',
                'password' => Hash::make('196508281989032001'),
                'updated_at' => \Carbon\Carbon::now()
            ],
            // Staff ZaWa
            [
                'name' => 'ERMANINGSIH ',
                'username' => '197706292007102008',
                'jabatan' => 'Staf',
                'email' => '197706292007102008@kemenag.go.id',
                'password' => Hash::make('197706292007102008'),
                'updated_at' => \Carbon\Carbon::now()

            ],

            // New One
            [
                'name' => 'SYARIFUDDIN ',
                'username' => '196503032014111003',
                'jabatan' => 'Staf',
                'email' => '196503032014111003@kemenag.go.id',
                'password' => Hash::make('196503032014111003'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'YUSNETI',
                'username' => '196702121998032002',
                'jabatan' => 'Staf',
                'email' => '196702121998032002@kemenag.go.id',
                'password' => Hash::make('196702121998032002'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'ASRIL. M',
                'username' => '196807031989021001',
                'jabatan' => 'Staf',
                'email' => '196807031989021001@kemenag.go.id',
                'password' => Hash::make('196807031989021001'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'AFNIZON, S.AP ',
                'username' => '197610182009011004',
                'jabatan' => 'Staf',
                'email' => '197610182009011004@kemenag.go.id',
                'password' => Hash::make('197610182009011004'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'KOKO NURHADI YANTO ',
                'username' => '198305042014111002',
                'jabatan' => 'Staf',
                'email' => '198305042014111002@kemenag.go.id',
                'password' => Hash::make('198305042014111002'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'ZULKIFLI',
                'username' => '196410112014111002',
                'jabatan' => 'Staf',
                'email' => '196410112014111002@kemenag.go.id',
                'password' => Hash::make('196410112014111002'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'SARIFAH AINI, S.Th I',
                'username' => '198701032011012010',
                'jabatan' => 'Staf',
                'email' => '198701032011012010@kemenag.go.id',
                'password' => Hash::make('198701032011012010'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'DODY YUSRIYAL',
                'username' => '198406262007101003',
                'jabatan' => 'Staf',
                'email' => '198406262007101003@kemenag.go.id',
                'password' => Hash::make('198406262007101003'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'RICHO HARDIATNO, S.Pd',
                'username' => '198312122009011013',
                'jabatan' => 'Staf',
                'email' => '198312122009011013@kemenag.go.id',
                'password' => Hash::make('198312122009011013'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'USRI',
                'username' => '197505162014111001',
                'jabatan' => 'Staf',
                'email' => '197505162014111001@kemenag.go.id',
                'password' => Hash::make('197505162014111001'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'Jarmil',
                'username' => '198005152005011007',
                'jabatan' => 'Staf',
                'email' => '198005152005011007@kemenag.go.id',
                'password' => Hash::make('198005152005011007'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'MUCHLIS, S.TP',
                'username' => '197603152005011006',
                'jabatan' => 'Staf',
                'email' => '197603152005011006@kemenag.go.id',
                'password' => Hash::make('197603152005011006'),
                'updated_at' => \Carbon\Carbon::now()

            ],
            [
                'name' => 'NELDAFINA, A.Md',
                'username' => '197112252007102002',
                'jabatan' => 'Staf',
                'email' => '197112252007102002@kemenag.go.id',
                'password' => Hash::make('197112252007102002'),
                'updated_at' => \Carbon\Carbon::now()

            ],
        ];


        // DB::table('users')->insert($data);

        foreach ($data as $key => $item) {
            \App\Models\User::firstOrCreate(
                ['username' => $item['username']],
                $item
            );
        }


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
                'name' => 'Seksi Penyelenggara Zakat dan Wakaf',
            ]
        ];


        // DB::table('daftar_unit_pengolah')->insert($units);
        foreach ($units as $key => $item) {
            \App\Models\UnitPengolah::firstOrCreate($item);
        }


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

        // DB::table('daftar_jenis_layanan')->insert($jenises);



        $outputs = [
                ['name' => 'Surat Rekomendasi'], #1
                ['name' => 'Surat Izin'],
                ['name' => 'Surat Keterangan'],
                ['name' => 'Surat Keputusan'],
                ['name' => 'Surat Edaran'],
                ['name' => 'Surat Penunjukan'], #6
                ['name' => 'Laporan'],
                ['name' => 'Legalisir'],
                ['name' => 'Sertifikat'],
                ['name' => 'Data dan Informasi'],
                ['name' => 'Berkas Lengkap'], #11
                ['name' => 'Saran Tindak Lanjut'],
                ['name' => 'Jadwal Konsultasi'],
                ['name' => 'Jadwal Audiensi'],
                ['name' => 'Karya Tulis'],
                ['name' => 'Persyaratan'], #16
                ['name' => 'Pengesahan'],
                ['name' => 'Pengajuan'],
                ['name' => 'Pengantar usul KP'],
                ['name' => 'Pengantar Pensiun'],
                ['name' => 'Rekomendasi'], #21
                ['name' => 'Arsip Surat'],
                ['name' => 'Formulir A 05'],
                ['name' => 'S 28 a'],
                ['name' => 'Tanda Tangan'],
                ['name' => 'Petugas Rohaniwan'], #26
                ['name' => 'Konsultasi'],
                ['name' => 'Pemahaman'],
                ['name' => 'Surat Pengesahan'],
                ['name' => 'Surat Pengantar'],
                ['name' => 'Surat Tugas'], #31
                ['name' => 'Surat Pesetujuan']
        ];

        // DB::table('daftar_output_layanan')->insert($outputs);



        $layanans = [
            [
                'name' => 'Pelayanan Data dan Informasi Umum',
                'id_unit_pengolah' => 1,
                'id_jenis_layanan' => 10,
                'id_output_layanan' => 10,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Pelayanan Surat Masuk',
                'id_unit_pengolah' => 1,
                'id_jenis_layanan' => 5,
                'id_output_layanan' => 22,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Pelayanan Surat Keluar',
                'id_unit_pengolah' => 1,
                'id_jenis_layanan' => 5,
                'id_output_layanan' => 22,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Pelayanan Pengaduan Masyarakat',
                'id_unit_pengolah' => 1,
                'id_jenis_layanan' => 11,
                'id_output_layanan' => 5,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
            [
                'name' => 'Izin Magang/PKL',
                'id_unit_pengolah' => 1,
                'id_jenis_layanan' => 2,
                'id_output_layanan' => 2,
                'lama_layanan' => 1,
                'biaya_layanan' => 0
            ],
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

        // DB::table('daftar_layanan')->insert($layanans);



        $syarats = [
            ['name' => 'Surat Masuk'], #1
            ['name' => 'Surat Keluar'],
            ['name' => 'Surat Permohonan'],
            ['name' => 'Fotokopi Buku Nikah'],
            ['name' => 'Fotokopi KTP'],
            ['name' => 'Keterangan Tertulis tentang Permalasahan yang Dikonsultasikan'], #6
            ['name' => 'Surat Pengantar dari Ka. KUA'],
            ['name' => 'Laporan'],
            ['name' => 'Data dan Informasi'],
            ['name' => 'Ijazah Asli yang akan diperbaiki'],
            ['name' => 'Foto Copy Akta Kelahiran / KK / KTP orang tua yang masih berlaku'], #11
            ['name' => 'FC sah Ijazah / STTB yang salah penulisannya'],
            ['name' => 'Ijazah / STTB asli yang salah penulisannya'],
            ['name' => 'Surat Pernyataan Tanggung Jawab Mutlak (FM-SKP-05)'],
            ['name' => 'Pas Foto berwarna ukuran 3 x 4 (2 lembar)'],
            ['name' => 'Materai Rp. 6.000,-'], #16
            ['name' => 'Mengisi dan menyerahkan Form FM-SKP-04 (bagi yang dikuasakan orang lain);'],
            ['name' => 'Fotocopy KTP (2 Lembar)'],
            ['name' => 'Fotocopy Kartu Keluarga (2 Lembar)'],
            ['name' => 'Fotocopy Surat / Akte Kelahiran / Ijazah / Nikah (2 Lembar)'],
            ['name' => 'Fotocopy BPIH (2 Lembar)'], #21
            ['name' => 'Surat Rekomendasi Pembuatan Paspor Umrah Asli dari Travel'],
            ['name' => 'Fotocopy SK Travel Umrah (2 lembar)'],
            ['name' => 'Fotocopy Kwitansi Pembayaran (2 lembar)'],
            ['name' => 'Fotocopy Paspor (bagi jamaah yang sudah memiliki paspor) (2 lembar)'],
            ['name' => 'Permohonan Ahli Waris diatas Materai 6000'], #26
            ['name' => 'Fotocopy KTP Almarhum (2 lembar)'],
            ['name' => 'Fotocopy KTP Ahli Waris (2 lembar)'],
            ['name' => 'BPIH Asli dan Fotocopy  (masing-masing 1 lembar)'],
            ['name' => 'Surat Keterangan Ahli Waris Asli dan Fotocopy dari Lurah (masing-masing 1 lembar)'],
            ['name' => 'Surat Keterangan Meninggal Dunia dari Kelurahan Asli dan foto copy (masing-masing 1 lembar)'], #31
            ['name' => 'Fotocopy Rekening Ahli Waris yang Satu Bank dengan Almarhum (2 lembar)'],
            ['name' => 'FC Akta Notaris Pendirian PT sebagai Biro perjalanan Wisata yang memiliki bidang keagamaan / perjalanan ibadah'],
            ['name' => 'FC Surat Pengesahan Akta Notaris dari Kemenkumham'],
            ['name' => 'FC Ijin Usaha Biro Perjalanan Wisata setempat harus sudah beroperasional paling singkat 2 (dua) tahu dibuktikan dengan Tanda Daftar Usaha Pariwisata (TDUP)'],
            ['name' => 'FC Surat Keterangan Domisili Usaha (SKDU) dari Pemda setempat yang masih berlaku'], #36
            ['name' => 'FC Surat Keterangan Terdaftar sebagai Wajib Pajak dari Dirjen Pajak Kementerian Keuangan'],
            ['name' => 'Surat Rekomendasi dari Kankemenag Kabupaten/Kota setempat (asli)'],
            ['name' => 'FC Surat Rekomendasi dari instansi Pemda Provinsi setempat dan/atau Kab/Kota setempat yang membidangi pariwisata'],
            ['name' => 'FC Laporan Keuangan perusahaan 1 (satu) tahun terakhir dan telah diaudit Akuntan Publik'],
            ['name' => 'Susunan dan struktur pengurus perusahaan (asli)'], #41
            ['name' => 'FC Kartu Tanda Penduduk (KTP) dan Biodata Pemegang saham dan anggota Direksi dan Komisaris (Semua WNI beragama Islam)'],
            ['name' => 'FC NPWP atas nama perusahaan dan pimpinan perusahaan'],
            ['name' => 'Foto-foto kondisi muka kantor dan ruang pelayanan serta kegiatan bimbingan umrah'],
            ['name' => 'FC Sertifikat keanggotaan ASITA'],
            ['name' => 'Laporan pelaksanaan Penyelenggaraan Ibadah Umrah 2 (dua) tahun terakhir yang dibuktikan dengan daftar jamaah yang telah mengikutinya/terdaftar di PPIU-nya'], #46
            ['name' => 'Bukti telah memberangkatkan jemaah umrah minimal 200 orang selama 3 (tiga) tahun;'],
            ['name' => 'Surat Keputusan Penetapan sebagai PPIU/ijin operasional PPIU yang masih berlaku'],
            ['name' => 'Surat Pengantar dari Madrasah'],
            ['name' => 'Foto Copy Karpeg'],
            ['name' => 'Foto Copy SK Pangkat Terakhir'], #51
            ['name' => 'Foto Copy SK Jabatan Terakhir'],
            ['name' => 'SK Jabatan  Stuktural'],
            ['name' => 'Surat permohonan dari yang besangkutan'],
            ['name' => 'SK Pangkat terakhir'],
            ['name' => 'SK Jabatan Terakhir'], #56
            ['name' => 'Persetujuan melepas dari tempat tugas sekarang'],
            ['name' => 'Dasar Surat Penugasan/Pemanggilan'],
            ['name' => 'Foto Copy SK PAK Terakhir'],
            ['name' => 'SKP 2 Tahun Terakhir'],
            ['name' => 'DUPAK'], #61
            ['name' => 'Penilaian Kinerja Guru'],
            ['name' => 'Bukti fisik sesuai dengan DUPAK'],
            ['name' => 'Lampiran yang menjadi bukti-bukti terjadinya fraud / gratifikasi'],
            ['name' => 'FC Sah SK CPNS'],
            ['name' => 'FC Sah SK PNS'], #66
            ['name' => 'FC Sah SK Pangkat Terakhir'],
            ['name' => 'FC Sah KARPEG'],
            ['name' => 'FC Sah Ijazah Terakhir'],
            ['name' => 'FC Sah Penilaian Prestasi Kerja + FC Sah SKP 2 Tahun terakhir'],
            ['name' => 'Surat Pernyataan Tidak Mutasi'], #71
            ['name' => 'Surat Pernyataan Tidak Menggangu Tugas Kedinasan'],
            ['name' => 'Surat Pernyataan Tidak Menuntut Penyesuaian Ijasah'],
            ['name' => 'Surat Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang atau Berat'],
            ['name' => 'Surat Keterangan Masih Aktif Kuliah Terbaru'],
            ['name' => 'Jadwal Kuliah Terbaru'], #76
            ['name' => 'Surat Keterangan Akriditasi Jurusan (minimal B)'],
            ['name' => 'Profil Perguruan Tinggi/Radius Lokasi'],
            ['name' => 'FC SK Mutasi terakhir (jika pada saat pengajuan, terdapat beda tempat tugas terakhir dengan tempat tugas yang tercantum pada SK Pangkat terakhir'],
            ['name' => 'Surat Pemohonan Magang dari Pimpinan Lembaga'],
            ['name' => 'Daftar nama peserta magang/praktek lapangan'], #81
            ['name' => 'Surat Permohonan Audiensi'],
            ['name' => 'Surat Permohonan/Pengantar dari Lembaga Pendidikan'],
        ];

        // DB::table('master_syarat_layanan')->insert($syarats);



        $daftarSyarats = [
            [
                'id_layanan' => 1, #Pelayanan Data dan Informasi Umum
                'id_master_syarat_layanan' => 3,
            ],
            [
                'id_layanan' => 2, #Pelayanan Surat Masuk
                'id_master_syarat_layanan' => 1,
            ],
            [
                'id_layanan' => 3, #Pelayanan Surat Keluar
                'id_master_syarat_layanan' => 2,
            ],
            [
                'id_layanan' => 4, #Pelayanan Pengaduan Masyarakat
                'id_master_syarat_layanan' => 64,
            ],
            [
                'id_layanan' => 5, #Izin Magang / PKL
                'id_master_syarat_layanan' => 80,
            ],
            [
                'id_layanan' => 5,
                'id_master_syarat_layanan' => 81,
            ],
            [
                'id_layanan' => 6, #Rekomendasi Pembuatan Paspor Haji
                'id_master_syarat_layanan' => 18,
            ],
            [
                'id_layanan' => 6,
                'id_master_syarat_layanan' => 19,
            ],
            [
                'id_layanan' => 6,
                'id_master_syarat_layanan' => 20,
            ],
            [
                'id_layanan' => 6,
                'id_master_syarat_layanan' => 21,
            ],
            [
                'id_layanan' => 7, #Rekomendasi Pembuatan Paspor Umrah
                'id_master_syarat_layanan' => 22
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 23
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 24
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 25
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 18
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 19
            ],
            [
                'id_layanan' => 7,
                'id_master_syarat_layanan' => 20
            ],
            [
                'id_layanan' => 8, #Pembatalan Haji (Berangkat)
                'id_master_syarat_layanan' => 3
            ],
            [
                'id_layanan' => 8,
                'id_master_syarat_layanan' => 18
            ],
            [
                'id_layanan' => 8,
                'id_master_syarat_layanan' => 29
            ],
            [
                'id_layanan' => 9, #Pembatalan Haji (Meninggal Dunia)
                'id_master_syarat_layanan' =>  26
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  27
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  28
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  29
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  30
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  31
            ],
            [
                'id_layanan' => 9,
                'id_master_syarat_layanan' =>  32
            ],
        ];

        // DB::table('daftar_syarat_layanan')->insert($daftarSyarats);
    }
}
