<?php

use App\Models\DaftarPelayanan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Test Excel
 */

Route::get('message/send/{to}/{text}', [\App\Http\Controllers\MessageController::class, 'sendMessage'])->name('message.send');

Route::get('phone_number/set', [\App\Http\Controllers\MessageController::class, 'setPhoneNumber'])->name('phonenumber.set');
Route::post('phone_number/store', [\App\Http\Controllers\MessageController::class, 'storePhoneNumber'])->name('phonenumber.store');

Route::post('upload-file/upload', [\App\Http\Controllers\Management\UploadFileController::class, 'upload'])->name('upload-file.upload');
Route::delete('upload-file/destroy/{id}', [\App\Http\Controllers\Management\UploadFileController::class, 'destroy'])->name('upload-file.destroy');

Route::get('/teset', function () {
    $pelayanan = DaftarPelayanan::where('id_pelayanan', 173)->with('arsip')->first();
    $arsip = $pelayanan->arsip;
    $dokumenMasuk = $arsip->dokumen_masuk_url;

    $dokumenBaru = [
        [
        'filename' => 'nuna',
        'file_url' => 'https://' . rand(10, 99999) . '.com',
        ],
        [
            'filename' => 'nuna2',
            'file_url' => 'https://' . rand(10, 99999) . '.com',
        ]
    ];

    $dokumenMasuk = array_merge($dokumenMasuk, $dokumenBaru);
    $arsip->dokumen_masuk_url = $dokumenMasuk;
    $arsip->save();

    $arsip->fresh();

    return $arsip;
});

Route::get('/mainten', function () {
    // return view('maintenancecop');
    return view('maintenance');
});

Route::get('/suspended', function () {
    // return view('maintenancecop');
    return view('suspended');
});

Route::get('/notfound', function () {
    // return view('maintenancecop');
    return view('notfound');
});

Route::get('/mapping', function () {
    $pels = \App\Models\DaftarPelayanan::with('layanan')->get();

    foreach ($pels as $pel) {
        $layanan = $pel->layanan;
        $pel->id_unit_pengolah = $layanan->id_unit_pengolah;
        $pel->save();
    }

    return 'done';
});

Route::get('/assign-role', function () {
    $usersWithoutRoles = \App\Models\User::withCount('roles')->has('roles', 0)->get();
    foreach ($usersWithoutRoles as $user) {
        $user->assignRole('staff');
    }
});

Route::get('/xc', function () {
    // $filename = 'Data Layanan.xlsx';
    // $toPath = public_path('/' . $filename);

    // $excel = \Excel::toArray([], $toPath);

    // $sheet = 0;
    // $row = 1;

    // $sheet = $excel[$sheet];
    // $dataLayanan = [];

    // foreach ($sheet as $row => $value) {
    //     if ($row > 1) {
    //         $namaL = $value[1];
    //         $unitL = $value[2];
    //         $jenisL = $value[3];
    //         $outputL = $value[4];
    //         $lamaL = $value[5];
    //         $biayaL = $value[6];

    //         $unit = \App\Models\UnitPengolah::firstOrCreate(['name' =>  $unitL]);
    //         $jenis = \App\Models\JenisLayanan::firstOrCreate(['name' =>  $jenisL]);
    //         $output = \App\Models\OutputLayanan::firstOrCreate(['name' =>  $outputL]);

    //         $dataLayanan[] = [
    //             'name' => $namaL,
    //             'id_unit_pengolah' => $unit->id_unit_pengolah,
    //             'id_jenis_layanan' => $jenis->id_jenis_layanan,
    //             'id_output_layanan' => $output->id_output_layanan,
    //             'lama_layanan' => $lamaL,
    //             'biaya_layanan' => $biayaL,
    //         ];
    //     }
    // }


    // return $dataLayanan;

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

    foreach ($syaratLayanan as $layanan => $arr) {
        $layanan = \App\Models\DaftarLayanan::where('name', $layanan)->first();
        $layanan->syarat()->sync($arr);
    }

    // return $syaratLayanan;
    return 'done';
});

Route::get('/enc/{id}', function ($id) {
    return urlencode(base64_encode($id));
});

Route::get('/dec/{id}', function ($id) {
    return urlencode(base64_encode($id));
});


Route::get('/summary/fetch', function () {
    $summary = \App\Models\DaftarPelayanan::select('status_pelayanan', DB::raw('count(*) as total'))
                                                ->groupBy('status_pelayanan')
                                                ->get();

    // ->whereYear('created_at', '=', date('Y'))
    // ->whereMonth('created_at', '=', date('m'))
    $username = \Auth::user()->username;
    $cDisposisi = \App\Models\DaftarDisposisi::whereHas('recipient', function ($q) use ($username) {
        $q->where('username', $username);
    })->doesntHave('child')
    ->count();

    return response()
    ->json([
         'summary' => $summary,
         'disposisi' => $cDisposisi
        ]);
});

Route::get('/publik/lacak-pelayanan/{id_pelayanan}/{pemohon_no_hp}', function ($id_pelayanan, $pemohon_no_hp) {
    $success = false;
    $message = '';
    $data = null;

    try {
        $pelayanan = \App\Models\DaftarPelayanan::where('id_pelayanan', $id_pelayanan)->firstOrFail();

        // return [
        //     '$pelayanan->pemohon_no_hp' => $pelayanan->pemohon_no_hp,
        //     '$pemohon_no_hp' => $pemohon_no_hp,
        // ];

        if ($pelayanan->pemohon_no_hp != $pemohon_no_hp) {
            throw new \Exception('Data no HP tidak sama dengan yang didaftarkan, harap cek kembali!');
        }

        $pelayanan->load('layanan', 'layanan.unit', 'layanan.output', 'layanan.jenis', 'disposisi.sender', 'disposisi.recipient', 'disposisi.aksi', 'arsip');
        $data = $pelayanan;

        $disposisiArr = $pelayanan->disposisi;
        $disposisiCurr = $disposisiArr->last();
        $lastRecipientUsername = $disposisiCurr->recipient ? $disposisiCurr->recipient->username : '';
        $primary = [
            'disposisiCurr' => $disposisiCurr,
        ];

        $success = true;
    } catch (\Exception $e) {
        $message = $e->getMessage();
    }

    return response()
        ->json([
            'success' => $success,
            'message' => $message,
            'data' => $data,
        ]);
});

/**
 * Public Routes
 */
Route::get('/', [\App\Http\Controllers\LandingController::class, 'index'])->name('landing.index');
Route::get('/tentang', [\App\Http\Controllers\LandingController::class, 'tentang'])->name('landing.tentang');
Route::get('/daftar-pelayanan', [\App\Http\Controllers\LandingController::class, 'daftarPelayanan'])->name('landing.daftar-pelayanan');
Route::get('/lacak-pelayanan', [\App\Http\Controllers\LandingController::class, 'lacakPelayanan'])->name('landing.lacak-pelayanan');

Route::get('/permohonan-pelayanan/buat/{idx_layanan?}', [\App\Http\Controllers\LandingController::class, 'create'])->name('landing.buat-pelayanan');
Route::get('/syarat-layanan/list/fetch/{layanan}', [\App\Http\Controllers\DataLayanan\ListSyaratLayananController::class, 'fetch'])->name('syarat-layanan-list.fetch');

Route::post('/daftar-pelayanan/store-landing', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'storeLanding'])->name('daftar-pelayanan.store-landing');
Route::get('/daftar-pelayanan/fetch/{id_pelayanan}', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'fetch'])->name('daftar-pelayanan.fetch');
Route::get('/daftar-pelayanan/search', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'search'])->name('daftar-pelayanan.search');
Route::delete('/daftar-pelayanan/destroy/{pelayanan}', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'destroy'])->name('daftar-pelayanan.destroy');

Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'showChangePasswordForm'])->name('change-password');
Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('changePassword');

Auth::routes();

// Route::middleware('auth')->group(function () {
Route::group(['middleware' => ['auth', 'same_password_with_username', 'phone_number']], function () {
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [\App\Http\Controllers\ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/daftar-pelayanan/detail/{idx}', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'detail'])->name('daftar-pelayanan.detail');


    /**
     * Notifications
     */
    Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
    Route::get('/notifications/fetch', [\App\Http\Controllers\NotificationController::class, 'fetch'])->name('notification.fetch');
    Route::get('/notifications/detail/{id}', [\App\Http\Controllers\NotificationController::class, 'detail'])->name('notification.detail');

    Route::group(['middleware' => ['role:super_administrator|administrator']], function () {
        /**
         * User
         */
        Route::get('/users/data', [\App\Http\Controllers\DataPengguna\UserController::class, 'index'])->name('user-data.index');
        Route::post('/users/data/store', [\App\Http\Controllers\DataPengguna\UserController::class, 'store'])->name('user-data.store');
        Route::delete('/users/data/destroy/{user}', [\App\Http\Controllers\DataPengguna\UserController::class, 'destroy'])->name('user-data.destroy');

        /**
         * Roles
         */
        Route::get('/users/roles', [\App\Http\Controllers\DataPengguna\RoleController::class, 'index'])->name('user-roles.index');
        Route::post('/users/roles/store', [\App\Http\Controllers\DataPengguna\RoleController::class, 'store'])->name('user-roles.store');
        Route::delete('/users/roles/destroy/{role}', [\App\Http\Controllers\DataPengguna\RoleController::class, 'destroy'])->name('user-roles.destroy');

        /**
         * Permissions
         */
        Route::get('/permissions', [\App\Http\Controllers\DataPengguna\PermissionController::class, 'index'])->name('permissions.index');
        Route::post('/permissions/store', [\App\Http\Controllers\DataPengguna\sController::class, 'store'])->name('permissions.store');
        Route::delete('/permissions/destroy/{permission}', [\App\Http\Controllers\DataPengguna\PermissionController::class, 'destroy'])->name('permissions.destroy');

        /**
         * Unit Pengolah
         */
        Route::get('/unit-pengolah', [\App\Http\Controllers\DataPengguna\UnitPengolahController::class, 'index'])->name('unit-pengolah.index');
        Route::post('/unit-pengolah/store', [\App\Http\Controllers\DataPengguna\UnitPengolahController::class, 'store'])->name('unit-pengolah.store');
        Route::delete('/unit-pengolah/destroy/{unit}', [\App\Http\Controllers\DataPengguna\UnitPengolahController::class, 'destroy'])->name('unit-pengolah.destroy');

        /**
         * Jenis Layanan
         */
        Route::get('/jenis-layanan', [\App\Http\Controllers\DataLayanan\JenisLayananController::class, 'index'])->name('jenis-layanan.index');
        Route::post('/jenis-layanan/store', [\App\Http\Controllers\DataLayanan\JenisLayananController::class, 'store'])->name('jenis-layanan.store');
        Route::delete('/jenis-layanan/destroy/{jenis}', [\App\Http\Controllers\DataLayanan\JenisLayananController::class, 'destroy'])->name('jenis-layanan.destroy');

        /**
         * Output Layanan
         */
        Route::get('/output-layanan', [\App\Http\Controllers\DataLayanan\OutputLayananController::class, 'index'])->name('output-layanan.index');
        Route::post('/output-layanan/store', [\App\Http\Controllers\DataLayanan\OutputLayananController::class, 'store'])->name('output-layanan.store');
        Route::delete('/output-layanan/destroy/{jenis}', [\App\Http\Controllers\DataLayanan\OutputLayananController::class, 'destroy'])->name('output-layanan.destroy');
    });

    Route::group(['middleware' => ['role:super_administrator|administrator|staff']], function () {
        /**
         * Daftar Layanan
         */
        Route::get('/daftar-layanan', [\App\Http\Controllers\DataLayanan\DaftarLayananController::class, 'index'])->name('daftar-layanan.index');
        Route::post('/daftar-layanan/store', [\App\Http\Controllers\DataLayanan\DaftarLayananController::class, 'store'])->name('daftar-layanan.store');
        Route::delete('/daftar-layanan/destroy/{layanan}', [\App\Http\Controllers\DataLayanan\DaftarLayananController::class, 'destroy'])->name('daftar-layanan.destroy');

        /**
         * Master Syarat Layanan
         */
        Route::get('/syarat-layanan/master', [\App\Http\Controllers\DataLayanan\MasterSyaratLayananController::class, 'index'])->name('syarat-layanan-master.index');
        Route::post('/syarat-layanan/master/store', [\App\Http\Controllers\DataLayanan\MasterSyaratLayananController::class, 'store'])->name('syarat-layanan-master.store');
        Route::delete('/syarat-layanan/master/destroy/{syarat}', [\App\Http\Controllers\DataLayanan\MasterSyaratLayananController::class, 'destroy'])->name('syarat-layanan-master.destroy');
        Route::get('/syarat-layanan/master/search', [\App\Http\Controllers\DataLayanan\MasterSyaratLayananController::class, 'search'])->name('syarat-layanan-master.search');

        /**
         * List Syarat Layanan
         */
        Route::get('/syarat-layanan/list', [\App\Http\Controllers\DataLayanan\ListSyaratLayananController::class, 'index'])->name('syarat-layanan-list.index');

        Route::post('/syarat-layanan/list/store', [\App\Http\Controllers\DataLayanan\ListSyaratLayananController::class, 'store'])->name('syarat-layanan-list.store');
        Route::put('/syarat-layanan/list/put/{id_layanan}/{id_master_syarat_layanan}', [\App\Http\Controllers\DataLayanan\ListSyaratLayananController::class, 'put'])->name('syarat-layanan-list.put');
        Route::delete('/syarat-layanan/list/destroy/{id_layanan}/{id_master_syarat_layanan}', [\App\Http\Controllers\DataLayanan\ListSyaratLayananController::class, 'destroy'])->name('syarat-layanan-list.destroy');
    });



    Route::group(['middleware' => ['role:super_administrator|administrator|operator|staff|manager']], function () {
        /**
         * Transaksi Pelayanan
         */
        Route::get('/daftar-pelayanan/list/{status}', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'index'])->name('daftar-pelayanan.index');
        Route::get('/daftar-pelayanan/create', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'create'])->name('daftar-pelayanan.create');
        Route::post('/daftar-pelayanan/store', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'store'])->name('daftar-pelayanan.store');
        Route::post('/daftar-pelayanan/update', [\App\Http\Controllers\DataPelayanan\DaftarPelayananController::class, 'update'])->name('daftar-pelayanan.update');

        /**
         * Arsip Pelayanan
         */
        Route::get('/arsip-pelayanan', [\App\Http\Controllers\DataArsip\ArsipPelayananController::class, 'index'])->name('arsip-pelayanan.index');
        Route::post('/arsip-pelayanan/store', [\App\Http\Controllers\DataArsip\ArsipPelayananController::class, 'store'])->name('arsip-pelayanan.store');
    });

    Route::group(['middleware' => ['role:super_administrator|administrator|director|manager|supervisor|staff']], function () {
        /**
         * Master Disposisi
         */
        Route::get('/disposisi/master', [\App\Http\Controllers\DataDisposisi\MasterDisposisiController::class, 'index'])->name('disposisi-master.index');
        Route::post('/disposisi/master/store', [\App\Http\Controllers\DataDisposisi\MasterDisposisiController::class, 'store'])->name('disposisi-master.store');
        Route::delete('/disposisi/master/destroy/{aksi}', [\App\Http\Controllers\DataDisposisi\MasterDisposisiController::class, 'destroy'])->name('disposisi-master.destroy');

        /**
         * Daftar Disposisi
         */
        Route::get('/disposisi/list/{status}', [\App\Http\Controllers\DataDisposisi\DaftarDisposisiController::class, 'index'])->name('disposisi-list.index');
        Route::post('/disposisi/list/store', [\App\Http\Controllers\DataDisposisi\DaftarDisposisiController::class, 'store'])->name('disposisi-list.store');
        Route::delete('/disposisi/list/destroy/{aksi}', [\App\Http\Controllers\DataDisposisi\DaftarDisposisiController::class, 'destroy'])->name('disposisi-list.destroy');
    });
});


Route::get('/pdf', [\App\Http\Controllers\DataPrint\PDFController::class, 'index'])->name('pdf.index');

Route::get('/create/pdf/{idx_pelayanan}', [\App\Http\Controllers\DataPrint\PDFController::class, 'create'])->name('pdf.create');



/**
 * Experiment
 */
Route::get('/exp', function () {
    // $usr = \App\Models\User::find(1);
    // return $usr->getRoleNames();

    // $hashid = \Vinkla\Hashids\Facades\Hashids::encode(1);
    // return $hashid;

    $recipient = \App\Models\User::whereHas('roles', function ($q) {
        $q->where('name', 'manager');
    })->first();

    $notifications = $recipient->unreadNotifications;
    foreach ($notifications as $key => $notif) {
        return $notif->id;
    }
});
