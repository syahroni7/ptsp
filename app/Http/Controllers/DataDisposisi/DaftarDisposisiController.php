<?php

namespace App\Http\Controllers\DataDisposisi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DaftarDisposisi;
use DataTables;

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
            $daftarDisposisi = DaftarDisposisi::with('pelayanan', 'sender', 'recipient')->get();

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
                    if($disposisi->sender) {
                        $kepada = $disposisi->recipient->name;
                    } else {
                        $kepada = $disposisi->pelayanan->penerima_nama;
                    }

                    return $kepada;
                })
                ->addColumn('action', function ($disposisi) {
                    $btn = '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Level / Peran User"><i class="bi bi-pencil-square"></i></button>&nbsp;';
                    $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs" data-bs-id_disposisi="'. $disposisi->id_disposisi  .'" data-id_disposisi="'.  $disposisi->id_disposisi  .'"><i class="bi bi-trash-fill"></i></button>';
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

        $data = $request->input();

        try {
            if ($data['id_disposisi'] == '') {
                DaftarDisposisi::create(['name' => $data['name']]);   
            } else {
                $unit = DaftarDisposisi::findOrFail($data['id_disposisi']);
                $unit->name = $data['name'];
                $unit->update();
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
