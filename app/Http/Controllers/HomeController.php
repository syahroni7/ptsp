<?php

namespace App\Http\Controllers;

use App\Models\TotalLayananPerHari;
use App\Models\TotalLayananPerMinggu;
use App\Models\DaftarLayanan;
use Illuminate\Http\Request;
use App\Models\DaftarPelayanan;
use Illuminate\Support\Facades\Hash;
use Auth;

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

                if ($sUnit[$key]['name'] == 'Subbagian Tata Usaha') {
                    $sUnit[$key]['name'] = 'SubbagTU';
                }

                if ($sUnit[$key]['name'] == 'Seksi Pendidikan Madrasah') {
                    $sUnit[$key]['name'] = 'Seksi PenMad';
                }

                if ($sUnit[$key]['name'] == 'Seksi Pendidikan Agama Islam') {
                    $sUnit[$key]['name'] = 'Seksi PAIs';
                }

                if ($sUnit[$key]['name'] == 'Seksi Pendidikan Diniyah dan Pondok Pesantren') {
                    $sUnit[$key]['name'] = 'Seksi PD Pontren';
                }

                if ($sUnit[$key]['name'] == 'Seksi Penyelenggaraan Haji dan Umrah') {
                    $sUnit[$key]['name'] = 'Seksi PHU';
                }

                if ($sUnit[$key]['name'] == 'Seksi Bimbingan Masyarakat Islam') {
                    $sUnit[$key]['name'] = 'Seksi BiMas';
                }

                if ($sUnit[$key]['name'] == 'Seksi Penyelenggara Zakat dan Wakaf') {
                    $sUnit[$key]['name'] = 'Seksi ZaWa';
                }
            }
        }

        // return $sUnit;

        $total = TotalLayananPerMinggu::orderBy('id_total_layanan_perminggu')->take(8)->get();

        $series [] = [
            'name' => 'Total Pelayanan',
            'data' => $total->pluck('total_pelayanan')
        ];

        $categories = $total->pluck('week_range');

        $dataWeekly = [
            'series' => $series,
            'categories' => $categories
        ];

        $totalD = TotalLayananPerHari::get();

        $seriesD [] = [
            'name' => 'Total Pelayanan',
            'data' => $totalD->pluck('total_pelayanan')
        ];

        $categoriesD = $totalD->pluck('date');

        $dataDaily = [
            'series' => $seriesD,
            'categories' => $categoriesD
        ];

        return view('admin.home.index', [
            'title'  => 'Halaman Beranda',
            'br1'  => 'Home',
            'br2'  => 'Beranda',
            'summaryPelayanan'  => $statusPelayanan,
            'totalByUnit'  => $sUnit,
            'dataWeekly'  => $dataWeekly,
            'dataDaily'  => $dataDaily,
            'greeting' => $this->_getGreeting()
        ]);
    }

    public function showChangePasswordForm()
    {
        return view('auth.changepassword', [
            'title' => 'Ubah Password'
        ]);
    }

    public function _getGreeting()
    {
        $greeting = '';
        $b = time();
        $hour = date("G", $b);

        if ($hour>=0 && $hour<=11) {
            $greeting = "Selamat Pagi ";
        } elseif ($hour >=12 && $hour<=14) {
            $greeting = "Selamat Siang ";
        } elseif ($hour >=15 && $hour<=17) {
            $greeting = "Selamat Sore ";
        } elseif ($hour >=17 && $hour<=18) {
            $greeting = "Selamat Petang ";
        } elseif ($hour >=19 && $hour<=23) {
            $greeting = "Selamat Malam ";
        }

        return $greeting;
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->plain_password = $request->get('new-password');
        $user->save();

        return redirect()->route('home')->with("success", "Password changed successfully !");
    }
}
