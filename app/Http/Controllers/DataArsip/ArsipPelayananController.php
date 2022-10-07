<?php

namespace App\Http\Controllers\DataArsip;

use Notification;
use App\Notifications\NewPelayananNotification;

use App\Http\Controllers\Controller;
use App\Models\DaftarArsip;
use App\Models\DaftarDisposisi;
use Illuminate\Http\Request;
use App\Models\DaftarPelayanan;
use App\Models\DaftarLayanan;
use App\Models\JenisLayanan;
use App\Models\MasterAksiDisposisi;
use App\Models\OutputLayanan;
use App\Models\UnitPengolah;
use App\Models\User;
use App\Notifications\NewUserNotification;
use DataTables;
use Auth;
use DB;
use Vinkla\Hashids\Facades\Hashids;

class ArsipPelayananController extends Controller
{
    public function index(Request $request, $status = null)
    {
        if ($request->ajax()) {
            if ($status) {
                $pelayanans = DaftarPelayanan::where('status_pelayanan', $status)
                ->with('layanan', 'unit', 'output', 'jenis', 'arsip')->orderBy('id_pelayanan', 'desc')->take(300)->get();
            } else {
                $pelayanans = DaftarPelayanan::where('status_pelayanan', 'Baru')->with('layanan', 'unit', 'output', 'jenis', 'arsip')->orderBy('id_pelayanan', 'desc')->take(300)->get();
            }


            return Datatables::of($pelayanans)
                ->addIndexColumn()
                ->addColumn('action', function ($layanan) {
                    $url = route('daftar-pelayanan.detail', Hashids::encode($layanan->id_pelayanan));
                    $urlPDF = route('pdf.create', Hashids::encode($layanan->id_pelayanan));
                    // $btn = '<a href="'.$urlPDF.'" target="_blank" id="pdfBtn" type="button" class="btn btn-sm btn-secondary btn-xs"><i class="bi bi-printer"></i></a>';


                    $btn = '<a href="'.$url.'" target="_blank" id="viewBtn" type="button" class="btn btn-sm btn-primary btn-xs mx-1"><i class="bi bi-journal-check"></i></a>';

                    $user = Auth::user();
                    if ($user->hasRole('super_administrator')) {
                        $btn .= '<button id="cetak-bukti-button" type="button" class="btn btn-secondary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-cetak_bukti_link="'.$urlPDF.'"><i class="bi bi-printer"></i></button>';
                        $btn .= '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs mx-1" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-pencil-square"></i></button>';
                        $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs mx-1" data-bs-id_layanan="'. $layanan->id_layanan  .'" data-id_layanan="'.  $layanan->id_layanan  .'"><i class="bi bi-trash-fill"></i></button>';
                    }

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $jenis_all = JenisLayanan::all();
        $unit_all = UnitPengolah::all();
        $output_all = OutputLayanan::all();
        $daftarLayanan = DaftarLayanan::with('unit')->get();


        $dd = [
            'jenis_all' => $jenis_all,
            'unit_all' => $unit_all,
            'output_all' => $output_all
        ];

        return view('admin.arsip.index', [
            'title'  => 'Daftar Arsip',
            'br1'  => 'Kelola',
            'br2'  => 'Arsip',
            'dd'   => $dd,
            'html_status' => '<span class="html-status">'.ucfirst($status).'</span>',
            'daftar_layanan'  => $daftarLayanan
        ])->render();
    }


    public function store(Request $request)
    {
        $success = false;
        $message = '';
        $code = 400;

        $data = $request->input();

        // try {
            $pelayanan = DaftarPelayanan::where('id_pelayanan', $data['id_pelayanan'])->with('arsip')->firstOrFail();
            if ($pelayanan->arsip) {
                $arsip = $pelayanan->arsip;
                if (isset($data['arsip_masuk_url'])) {
                    $arsip->update([
                        'arsip_masuk_url' => $data['arsip_masuk_url']
                    ]);
                }

                if (isset($data['arsip_keluar_url'])) {
                    $arsip->update([
                        'arsip_keluar_url' => $data['arsip_keluar_url']
                    ]);
                }
            } else {
                $username = Auth::user()->username;
                $arsip = new DaftarArsip();
                $arsip->id_pelayanan = $data['id_pelayanan'];
                if (isset($data['arsip_masuk_url'])) {
                    $arsip->arsip_masuk_url = $data['arsip_masuk_url'];
                    $arsip->created_by_masuk = $username;
                }

                if (isset($data['arsip_keluar_url'])) {
                    $arsip->arsip_keluar_url = $data['arsip_keluar_url'];
                    $arsip->created_by_keluar = $username;
                }

                $arsip->save();
            }

            $success = true;
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        // } catch (\Throwable $th) {
        //     $message = $th->getMessage();
        // }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'code' => $code,
        ], $code);
    }
}
