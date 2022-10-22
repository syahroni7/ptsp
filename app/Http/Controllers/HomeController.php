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
                                                ->with('unit')
                                                ->get();

        $pByStatus = $pelayananColl->groupBy('status_pelayanan');

        foreach ($statusPelayanan as $key => $item) {
            $countItem = isset($pByStatus[$item['name']]) ? $pByStatus[$item['name']]->count() : 0;
            $statusPelayanan[$key]['total'] = $countItem;
        }

        $sUnit = [];
        $units = \App\Models\UnitPengolah::all();
        foreach ($units as $key => $item) {
            $sUnit[] = [
                'name' => $item->name,
                'full_name' => $item->name,
                'value' => 0
            ];
        }

        $pByUnit = $pelayananColl->groupBy('unit.name');

        if($pByUnit) {
            foreach ($sUnit as $key => $item) {
                $countItem = isset($pByUnit[$item['name']]) ? $pByUnit[$item['name']]->count() : 0;
                $sUnit[$key]['value'] = $countItem;

                if($sUnit[$key]['name'] == 'Subbagian Tata Usaha'){
                    $sUnit[$key]['name'] = 'SubbagTU';
                } 

                if($sUnit[$key]['name'] == 'Seksi Pendidikan Madrasah'){
                    $sUnit[$key]['name'] = 'Seksi PenMad';
                } 

                if($sUnit[$key]['name'] == 'Seksi Pendidikan Agama Islam'){
                    $sUnit[$key]['name'] = 'Seksi PAIs';
                } 

                if($sUnit[$key]['name'] == 'Seksi Pendidikan Diniyah dan Pondok Pesantren'){
                    $sUnit[$key]['name'] = 'Seksi PD Pontren';
                } 

                if($sUnit[$key]['name'] == 'Seksi Penyelenggaraan Haji dan Umrah'){
                    $sUnit[$key]['name'] = 'Seksi PHU';
                } 

                if($sUnit[$key]['name'] == 'Seksi Bimbingan Masyarakat Islam'){
                    $sUnit[$key]['name'] = 'Seksi BiMas';
                } 

                if($sUnit[$key]['name'] == 'Seksi Penyelenggara Zakat dan Wakaf'){
                    $sUnit[$key]['name'] = 'Seksi ZaWa';
                } 
            }
        }


        return view('admin.home.index', [
            'title'  => 'Halaman Beranda',
            'br1'  => 'Home',
            'br2'  => 'Beranda',
            'statusPelayanan'  => $statusPelayanan,
            'totalByUnit'  => $sUnit
        ]);
    }
}
