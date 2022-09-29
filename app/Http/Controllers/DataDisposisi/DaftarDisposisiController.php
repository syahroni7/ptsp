<?php

namespace App\Http\Controllers\DataDisposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarDisposisi;
use DataTables;
use Vinkla\Hashids\Facades\Hashids;
use Auth;
use Notification;
use App\Notifications\NewPelayananNotification;

class DaftarDisposisiController extends Controller
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

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $username = Auth::user()->username;
            $daftarDisposisi = DaftarDisposisi::whereHas('recipient', function($q) use($username) {
                                    $q->where('username', $username);
                                })
                                ->with('pelayanan', 'sender', 'recipient')->get();

            return Datatables::of($daftarDisposisi)
                ->addIndexColumn()
                ->addColumn('dari', function ($disposisi) {
                    $dari = '';
                    if($disposisi->sender) {
                        $dari = $disposisi->sender->name;
                    } else {
                        $dari = $disposisi->pelayanan->pemohon_nama;
                    }

                    return $dari;
                })
                ->addColumn('kepada', function ($disposisi) {
                    $kepada = '';
                    if($disposisi->recipient) {
                        $kepada = $disposisi->recipient->name;
                    } else {
                        $kepada = $disposisi->pelayanan->penerima_nama;
                    }

                    return $kepada;
                })
                ->addColumn('action', function ($disposisi) {
                    // $btn = '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Level / Peran User"><i class="bi bi-pencil-square"></i></button>&nbsp;';
                    // $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs" data-bs-id_disposisi="'. $disposisi->id_disposisi  .'" data-id_disposisi="'.  $disposisi->id_disposisi  .'"><i class="bi bi-trash-fill"></i></button>';
                    // return $btn;

                    $url = route('daftar-pelayanan.detail', Hashids::encode( $disposisi->id_pelayanan) );
                    $btn = '<a href="'.$url.'" target="_blank" id="viewBtn" type="button" class="btn btn-sm btn-primary btn-xs"><i class="bi bi-search"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.disposisi.list.index', [
            'title'  => 'Daftar Disposisi',
            'br1'  => 'Kelola',
            'br2'  => 'Disposisi Pelayanan',
        ]);

    }

    public function store(Request $request)
    {
        $success = 'nope';
        $message = '';
        $code = 400;
        $recipient = null;
        $disposisi = null;

        $data = $request->input();

        try {

            // Create Disposisi
            $disposisi = new DaftarDisposisi();
            $disposisi->id_pelayanan = $data['id_pelayanan'];
            $disposisi->id_aksi_disposisi = $data['id_aksi_disposisi'];
            $disposisi->urutan_disposisi = $data['urutan_disposisi'];
            if($data['id_disposisi_parent']) {
                $disposisi->id_disposisi_parent = $data['id_disposisi_parent'];
            }
            $disposisi->keterangan = $data['keterangan'];
            $disposisi->id_sender = Auth::user()->id;
            $disposisi->username_sender = Auth::user()->username;
            $recipient = \App\Models\User::find($data['id_recipient']);
            if($recipient) {
                $disposisi->id_recipient = $recipient->id;
                $disposisi->username_recipient = $recipient->username;
            }
            $disposisi->save();
            $disposisi->fresh();
            $disposisi->load('pelayanan');

            if($recipient) {
                Notification::send($recipient, new NewPelayananNotification($disposisi));
            }

            $success = 'yeah';
            $code = 200;
            $message = 'Data Berhasil Disimpan';
        } catch (\Throwable $th) {
            $message = $th->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'code' => $code,
            'recipient' => $recipient,
            'disposisi' => $disposisi,
        ], $code);
    }

    public function destroy(DaftarDisposisi $disposisi)
    {
        $success = false;
        $message = '';

        try {
            $disposisi->delete();
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }
}
