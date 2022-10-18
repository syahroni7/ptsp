<?php

namespace App\Http\Controllers;

use App\Models\DaftarLayanan;
use Illuminate\Http\Request;
use App\Models\DaftarPelayanan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $statusPelayanan = [
            [
                'name' => 'Baru',
                'color' => 'danger',
                'total' => 0,
            ],
            [
                'name' => 'Proses',
                'color' => 'secondary',
                'total' => 0,
            ],
            [
                'name' => 'Selesai',
                'color' => 'primary',
                'total' => 0,
            ],
            [
                'name' => 'Ambil',
                'color' => 'success',
                'total' => 0,
            ]
        ];

        $pelayananColl = DaftarPelayanan::whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->get()
                                                ->groupBy('status_pelayanan');

                foreach ($statusPelayanan as $key => $item) {
                    $countItem = isset($pelayananColl[$item['name']]) ? $pelayananColl[$item['name']]->count() : 0;
                    $statusPelayanan[$key]['total'] = $countItem;
                }

        return view('admin.home.index', [
            'title'  => 'Halaman Beranda',
            'br1'  => 'Home',
            'br2'  => 'Beranda',
            'statusPelayanan'  => $statusPelayanan
        ]);
    }
}
