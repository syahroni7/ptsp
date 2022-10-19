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
use App\Models\MasterAksiDisposisi;
use App\Models\OutputLayanan;
use App\Models\UnitPengolah;
use App\Models\User;
use App\Notifications\NewUserNotification;
use DataTables;
use Auth;
use DB;
use Vinkla\Hashids\Facades\Hashids;

class DaftarPelayananController extends Controller
{
    public function index(Request $request, $status)
    {
        if ($request->ajax()) {
            // $layanans = DaftarPelayanan::with('layanan', 'unit', 'output', 'jenis')->get();
            $pelayanans = DaftarPelayanan::where('status_pelayanan', $status)
            ->with('layanan', 'unit', 'output', 'jenis')->orderBy('id_pelayanan', 'desc')->take(300)->get();

            return Datatables::of($pelayanans)
                ->addIndexColumn()
                ->addColumn('action', function ($layanan) {
                    $url = route('daftar-pelayanan.detail', Hashids::encode($layanan->id_pelayanan));
                    $urlPDF = route('pdf.create', Hashids::encode($layanan->id_pelayanan));
                    // $btn = '<a href="'.$urlPDF.'" target="_blank" id="pdfBtn" type="button" class="btn btn-sm btn-secondary btn-xs"><i class="bi bi-printer"></i></a>';
                    $btn = '<button id="cetak-bukti-button" type="button" class="btn btn-secondary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#ExtralargeModal" data-cetak_bukti_link="'.$urlPDF.'"><i class="bi bi-printer"></i></button>';
                    $btn .= '<a href="'.$url.'" target="_blank" id="viewBtn" type="button" class="btn btn-sm btn-primary btn-xs mx-1"><i class="bi bi-journal-check"></i></a>';

                    $btn .= '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs mx-1" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Item Layanan"><i class="bi bi-pencil-square"></i></button>';
                    $user = Auth::user();
                    if ($user->hasRole('super_administrator') || $user->hasRole('operator')) {
                        $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs mx-1" data-bs-id_pelayanan="'. $layanan->id_pelayanan  .'" data-id_pelayanan="'.  $layanan->id_pelayanan  .'"><i class="bi bi-trash-fill"></i></button>';
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
        $summary = [];
        $recipient = null;
        $disposisi = null;

        try {
            $layanan = DaftarLayanan::where('id_layanan', $data['id_layanan'])->first();
            $pelayananCount = DaftarPelayanan::whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->count();

            $pelayananCount = $pelayananCount == 0 ? 1 : ($pelayananCount + 1);

            // Create Pelayanan
            $pelayanan = new DaftarPelayanan();
            $pelayanan->id_layanan = $data['id_layanan'];
            $pelayanan->no_registrasi = "02".date('ymd').sprintf('%02d', $layanan->id_unit_pengolah).sprintf('%02d', $data['id_layanan']).sprintf('%03d', $pelayananCount);
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
            $pelayanan->created_by = Auth::user()->name;
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
                $disposisi->save();
                $disposisi->fresh();
                $disposisi->load('pelayanan');

                Notification::send($recipient, new NewPelayananNotification($disposisi));
            }

            $newData = $pelayanan;

            $summary = DaftarPelayanan::select('status_pelayanan', DB::raw('count(*) as total'))
                                                ->whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->groupBy('status_pelayanan')
                                                ->get();

            $success = true;
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        return response()
            ->json([
                'success' => $success,
                'message' => $message,
                'data' => $newData,
                'summary' => $summary,
                'recipient' => $recipient,
                'disposisi' => $disposisi,
                'totalNotifikasi' => $recipient->unreadNotifications->count()
            ]);
    }

    public function update(Request $request)
    {
        $success = false;
        $message = '';
        $code = 400;

        $data = $request->input();
        $newData = null;
        $summary = [];

        try {
            $pelayanan = DaftarPelayanan::where('id_pelayanan', $data['id_pelayanan'])->first();

            // Create Pelayanan
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

            $summary = DaftarPelayanan::select('status_pelayanan', DB::raw('count(*) as total'))
                                                ->whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->groupBy('status_pelayanan')
                                                ->get();

            $success = true;
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        return response()
            ->json([
                'success' => $success,
                'message' => $message,
                'data' => $newData,
                'summary' => $summary,
            ]);
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
            $pelayanan->load('layanan', 'layanan.unit', 'layanan.output', 'layanan.jenis', 'arsip');
            $data = $pelayanan;
            $url_detail = route('daftar-pelayanan.detail', $pelayanan->idx_pelayanan);
            $url_pdf = route('pdf.create', $pelayanan->idx_pelayanan);
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json([
                'success' => $success,
                'message' => $message,
                'data' => $data,
                'url_detail' => $url_detail,
                'url_pdf' => $url_pdf
            ]);
    }

    public function detail(Request $request, $idx)
    {
        $id_pelayanan = Hashids::decode($idx);

        if ($request->ajax()) {
            $success = false;
            $message = '';
            $data = null;

            try {
                $pelayanan = DaftarPelayanan::where('id_pelayanan', $id_pelayanan)->firstOrFail();
                $pelayanan->load('layanan', 'layanan.unit', 'layanan.output', 'layanan.jenis', 'disposisi.sender', 'disposisi.recipient', 'disposisi.aksi', 'arsip');
                $data = $pelayanan;

                $disposisiArr = $pelayanan->disposisi;
                $disposisiCurr = $disposisiArr->last();
                $lastRecipientUsername = $disposisiCurr->recipient ? $disposisiCurr->recipient->username : '';

                $userLoggedUsername = Auth::user()->username;
                $primary = [
                    'disposisiCurr' => $disposisiCurr,
                    'bisa_disposisi' => ($userLoggedUsername == $lastRecipientUsername)
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
                    'primary' => $primary,
                ]);
        }




        $daftarLayanan = DaftarLayanan::all();
        $pegawai = User::all();
        $aksi = MasterAksiDisposisi::all();



        return view('admin.daftar-pelayanan.detail', [
            'title'  => 'Detail Pelayanan Publik',
            'br1'  => 'Pelayanan Publik',
            'br2'  => 'Detail',
            'daftar_layanan'  => $daftarLayanan,
            'id_pelayanan'  => $idx,
            'pegawai' => $pegawai,
            'aksi' => $aksi
        ])->render();
    }

    public function storeLanding(Request $request)
    {
        $success = false;
        $message = '';
        $code = 400;

        $data = $request->input();
        $newData = null;
        $summary = [];
        $recipient = null;
        $disposisi = null;

        // try {
            $layanan = DaftarLayanan::where('id_layanan', $data['id_layanan'])->first();
            $pelayananCount = DaftarPelayanan::whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->count();

            $pelayananCount = $pelayananCount == 0 ? 1 : ($pelayananCount + 1);

            // Create Pelayanan
            $pelayanan = new DaftarPelayanan();
            $pelayanan->id_layanan = $data['id_layanan'];
            $pelayanan->no_registrasi = "01".date('ymd').sprintf('%02d', $layanan->id_unit_pengolah).sprintf('%02d', $data['id_layanan']).sprintf('%03d', $pelayananCount);
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
            $pelayanan->created_by = Auth::user() ? Auth::user()->name : 'Sistem';
            $pelayanan->save();
            $pelayanan->fresh();

            if ($data['status_pelayanan'] == 'Baru') {
                // Create Disposisi
                $disposisi = new DaftarDisposisi();
                $disposisi->id_pelayanan = $pelayanan->id_pelayanan;
                $disposisi->id_aksi_disposisi = 12; // aksi 'mohon_arahan'
                $disposisi->urutan_disposisi = 1;
                $recipient = \App\Models\User::whereHas('roles', function ($q) {
                    $q->where('name', 'manager');
                })->first();
                $disposisi->id_recipient = $recipient->id;
                $disposisi->username_recipient = $recipient->username;
                $disposisi->save();
                $disposisi->fresh();
                $disposisi->load('pelayanan');

                Notification::send($recipient, new NewPelayananNotification($disposisi));


                // Send Notif to Operator
                $operator = \App\Models\User::whereHas('roles', function ($q) {
                    $q->where('name', 'operator');
                })->first();
                Notification::send($operator, new NewPelayananNotification($disposisi));
            }

            $newData = $pelayanan;

            $summary = DaftarPelayanan::select('status_pelayanan', DB::raw('count(*) as total'))
                                                ->whereYear('created_at', '=', date('Y'))
                                                ->whereMonth('created_at', '=', date('m'))
                                                ->groupBy('status_pelayanan')
                                                ->get();

            $success = true;
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        // } catch (\Throwable $th) {
        //     $message = $th->getMessage();
        // }

        return response()
            ->json([
                'success' => $success,
                'message' => $message,
                'data' => $newData,
                'summary' => $summary,
                'recipient' => $recipient,
                'disposisi' => $disposisi,
            ]);
    }


    public function destroy(DaftarPelayanan $pelayanan)
    {
        $success = false;
        $message = '';

        try {
            $pelayanan->delete();
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }
}
