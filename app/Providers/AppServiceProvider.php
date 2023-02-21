<?php

namespace App\Providers;

use App\Models\DaftarPelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Config;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('*', function ($view) {
            // all views will have access to current route
            $view->with('current_route', \Route::getCurrentRoute());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        config(['app.locale' => 'id']);
        Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');

        View::composer('*', function ($view) {
            $user = auth()->user();
            if ($user) {
                // $statusPelayanan['danger'] = 'baru';
                // $statusPelayanan['secondary'] = 'proses';
                // $statusPelayanan['primary'] = 'selesai';
                // $statusPelayanan['success'] = 'ambil';

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
                        ],
                        [
                            'name' => 'Semua',
                            'color' => 'info',
                            'total' => 0,
                        ]
                ];

                // $pelayananColl = DaftarPelayanan::whereYear('created_at', '=', date('Y'))
                //                                 ->whereMonth('created_at', '=', date('m'))


                
                // $pelayananColl = DaftarPelayanan::get()
                //                                 ->groupBy('status_pelayanan');

                // foreach ($statusPelayanan as $key => $item) {
                //     $countItem = isset($pelayananColl[$item['name']]) ? $pelayananColl[$item['name']]->count() : 0;
                //     $statusPelayanan[$key]['total'] = $countItem;
                // }

                // $username = \Auth::user()->username;
                // $cDisposisi = \App\Models\DaftarDisposisi::whereHas('recipient', function ($q) use ($username) {
                //     $q->where('username', $username);
                // })->count();

                $view->with('statusPelayanan', $statusPelayanan);
                // $view->with('disposisi', $cDisposisi);
            }
        });
    }
}
