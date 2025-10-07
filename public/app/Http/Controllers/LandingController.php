<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\DaftarPelayanan;
use DB;
use DateTime;
use DateInterval;


class LandingController extends Controller
{
    /* public function index()
    {
        $units = \App\Models\UnitPengolah::with('layanan')->get();
        return view('layouts.landing.bizland.index', [
            'units' => $units,
        ]);
    } */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $access_type = DB::table('access_type')->first();
        $type = $access_type->name;

        $statusPelayanan = [];
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

        // $pelayananColl = DaftarPelayanan::whereYear('created_at', '=', date('Y'))
        //                                         ->whereMonth('created_at', '=', date('m'))
        $pelayananColl = DaftarPelayanan::with('unit')
            ->get();

        $pByStatus = $pelayananColl->groupBy('status_pelayanan');

        foreach ($statusPelayanan as $key => $item) {
            $countItem = isset($pByStatus[$item['name']]) ? $pByStatus[$item['name']]->count() : 0;
            $statusPelayanan[$key]['total'] = $countItem;
        }

        $sUnit = [];
        if ($type != 'MINIMAL') {
            $units = \App\Models\UnitPengolah::all();
            foreach ($units as $key => $item) {
                $sUnit[] = [
                    'name' => $item->name,
                    'full_name' => $item->name,
                    'value' => 0
                ];
            }

            $pByUnit = $pelayananColl->groupBy('unit.name');

            if ($pByUnit) {
                foreach ($sUnit as $key => $item) {
                    $countItem = isset($pByUnit[$item['name']]) ? $pByUnit[$item['name']]->count() : 0;
                    $sUnit[$key]['value'] = $countItem;

                    if (isset($pByUnit[$item['name']])) {
                        $byStat = $pByUnit[$item['name']]->groupBy('status_pelayanan');
                        $sUnit[$key]['Baru'] = isset($byStat['Baru']) ? $byStat['Baru']->count() : 0;
                        $sUnit[$key]['Proses'] = isset($byStat['Proses']) ? $byStat['Proses']->count() : 0;
                        $sUnit[$key]['Selesai'] = isset($byStat['Selesai']) ? $byStat['Selesai']->count() : 0;
                    } else {
                        $sUnit[$key]['Baru'] = 0;
                        $sUnit[$key]['Proses'] = 0;
                        $sUnit[$key]['Selesai'] = 0;
                    }

                }
            }
        }

        /*Menampilkan landing view */
        return view('layouts.landing.bizland.index', [
            'units' => $units,
            'summaryPelayanan'  => $statusPelayanan,
            'totalByUnit'  => $sUnit,
            'type' => $type,
        ]);
        /*End */
    }


    public function create($idx_layanan = null)
    {
        if ($idx_layanan) {
            $arr = \Vinkla\Hashids\Facades\Hashids::decode($idx_layanan);
            if (isset($arr[0])) {
                $id_layanan = $arr[0];
            } else {
                // Bisa juga log error atau handle sesuai kebutuhan
                $id_layanan = null;
            }
        }

        $daftarLayanan = \App\Models\DaftarLayanan::all();
        // $daftarLayanan = DaftarLayanan::whereHas('syarat')->get();

        return view('landing.buat-pelayanan.index', [
            'daftar_layanan'  => $daftarLayanan,
            'id_layanan' => $id_layanan ?? null,
            'title' => 'Buat Permohonan Layanan'
        ]);
    }

    public function tentang()
    {
        return view('landing.tentang.index', [
            'title' => 'Tentang Pelayanan Terpadu Satu Pintu'
        ]);
    }

    public function aksesibilitas()
    {
        return view('landing.aksesibilitas.index', [
            'title' => 'Pelayanan Ramah Kelompok Rentan'
        ]);
    }

    public function daftarPelayanan()
    {
        $units = \App\Models\UnitPengolah::with('layanan')->get();
        return view('landing.daftar-pelayanan.index', [
            'title' => 'Daftar Pelayanan PTSP Online',
            'units' => $units
        ]);
    }

    public function lacakPelayanan()
    {
        $daftarLayanan = \App\Models\DaftarLayanan::all();
        return view('landing.lacak-pelayanan.index', [
            'title' => 'Lacak Permohonan Pelayanan',
            'daftar_layanan'  => $daftarLayanan,
        ]);
    }

    public function detailPelayanan($idx)
    {
        $daftarLayanan = \App\Models\DaftarLayanan::all();
        return view('landing.detail-pelayanan.index', [
            'title' => 'Detail Permohonan Pelayanan',
            'daftar_layanan'  => $daftarLayanan,
            'idx_pelayanan'  => $idx,
        ]);
    }
}
