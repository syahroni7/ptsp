<?php

namespace App\Http\Controllers\DataPelayanan;

use Notification;
use App\Notifications\NewPelayananNotification;

use App\Http\Controllers\Controller;
use App\Models\DaftarDisposisi;
use Illuminate\Http\Request;
use App\Models\DaftarPelayanan;
use App\Models\DaftarLayanan;
use App\Models\JenisLayanan;
use App\Models\OutputLayanan;
use App\Models\UnitPengolah;
use App\Notifications\NewUserNotification;
use DataTables;
use Auth;

class DaftarPelayananController extends Controller
{
    public function index(Request $request, $status)
    {
        if ($request->ajax()) {
            // $layanans = DaftarPelayanan::with('layanan', 'unit', 'output', 'jenis')->get();
            $layanans = DaftarPelayanan::where('status_pelayanan', $status)
            ->with('layanan', 'unit', 'output', 'jenis')->get();

            return Datatables::of($layanans)
                ->addIndexColumn()
                ->addColumn('action', function ($layanan) {
                    $btn = '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-pencil-square"></i></button>&nbsp;';
                    $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs" data-bs-id_layanan="'. $layanan->id_layanan  .'" data-id_layanan="'.  $layanan->id_layanan  .'"><i class="bi bi-trash-fill"></i></button>';
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

        return view('admin.daftar-pelayanan.index', [
            'title'  => 'Daftar Pelayanan Publik',
            'br1'  => 'Kelola',
            'br2'  => 'Daftar Pelayanan Publik',
            'br3'  => $status,
            'status'  => $status,
            'dd'   => $dd,
            'html_status' => '<span class="html-status">'.ucfirst($status).'</span>',
            'daftar_layanan'  => $daftarLayanan
        ])->render();
    }

    public function create()
    {
        $daftarLayanan = DaftarLayanan::all();
        return view('admin.daftar-pelayanan.create', [
            'title'  => 'Input - Lacak Pelayanan Publik',
            'br1'  => 'Input - Lacak',
            'br2'  => 'Daftar Pelayanan Publik',
            'daftar_layanan'  => $daftarLayanan
        ])->render();
    }

    public function store(Request $request)
    {
        $success = false;
        $message = '';
        $code = 400;

        $data = $request->input();
        $newData = null;

        try {
            $pelayananCount = DaftarPelayanan::count();
            $pelayananCount = $pelayananCount == 0 ? 1 : $pelayananCount++;

            // Create Pelayanan
            $pelayanan = new DaftarPelayanan();
            $pelayanan->id_layanan = $data['id_layanan'];
            $pelayanan->no_registrasi = "02".date('Ymd').sprintf('%02d', $data['id_layanan']).sprintf('%04d', $pelayananCount);
            $pelayanan->perihal = $data['perihal'];
            $pelayanan->pemohon_nama = $data['pemohon_nama'];
            $pelayanan->pemohon_no_surat = $data['pemohon_no_surat'];
            $pelayanan->pemohon_tanggal_surat = $data['pemohon_tanggal_surat'];
            $pelayanan->pengirim_nama = $data['pengirim_nama'];
            $pelayanan->pemohon_alamat = $data['pemohon_alamat'];
            $pelayanan->pemohon_no_hp = $data['pemohon_no_hp'];
            $pelayanan->kelengkapan_syarat = $data['kelengkapan_syarat'];
            $pelayanan->status_pelayanan = $data['status_pelayanan'];
            $pelayanan->catatan = $data['catatan'];
            $pelayanan->save();
            $pelayanan->fresh();

            if ($data['status_pelayanan'] == 'Baru') {
                // Create Disposisi
                $disposisi = new DaftarDisposisi();
                $disposisi->id_pelayanan = $pelayanan->id_pelayanan;
                $disposisi->id_aksi_disposisi = 4; // aksi 'ditindaklanjuti'
                $disposisi->urutan_disposisi = 1;
                $disposisi->id_sender = Auth::user()->id;
                $disposisi->username_sender = Auth::user()->username;
                $recipient = \App\Models\User::whereHas('roles', function ($q) {
                    $q->where('name', 'manager');
                })->first();
                $disposisi->id_recipient = $recipient->id;
                $disposisi->username_recipient = $recipient->username;
                $disposisi->urutan_disposisi = 1;
                $disposisi->save();

                Notification::send($recipient, new NewPelayananNotification($pelayanan));
            }

            $newData = $pelayanan;

            $success = true;
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message, 'data' => $newData]);

        // return redirect()->route('daftar-pelayanan.index', strtolower($data['status_pelayanan']));
    }

    public function search(Request $request)
    {
        $data = $request->input();

        $pelayanans = DaftarPelayanan::where('no_registrasi', 'like', '%' .  $data['q'] . '%')
                        ->get();

        return response()->json($pelayanans);
    }

    public function fetch($id_pelayanan)
    {
        $success = false;
        $message = '';
        $data = null;

        try {
            $pelayanan = DaftarPelayanan::find($id_pelayanan);
            $pelayanan->load('layanan', 'layanan.unit', 'layanan.output', 'layanan.jenis');
            $data = $pelayanan;
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message, 'data' => $data]);
    }
}
