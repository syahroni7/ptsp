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
        Carbon::setLocale('id');

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


                $view->with('statusPelayanan', $statusPelayanan);
            }
        });
    }
}
