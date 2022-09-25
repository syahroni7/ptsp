<?php

namespace App\Http\Controllers\DataUtama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;

class RoleController extends Controller
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
            $roles = Role::all();

            return Datatables::of($roles)
                ->addIndexColumn()
                ->addColumn('action', function ($role) {
                    $btn = '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#fModal" data-title="Edit Data Level / Peran User"><i class="bi bi-pencil-square"></i></button>&nbsp;';
                    $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs" data-bs-role_id="'. $role->id  .'" data-role_id="'.  $role->id  .'"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.users.roles.index', [
            'title'  => 'Daftar Level Pengguna Sistem PTSP',
            'br1'  => 'Kelola',
            'br2'  => 'Data Level / Peran Pengguna',
        ]);

        
    }

    public function store(Request $request)
    {
        $success = 'nope';
        $message = '';
        $code = 400;

        $data = $request->input();

        try {
            if ($data['id_role'] == '') {
                Role::create(['name' => $data['name']]);   
            } else {
                $role = Role::findOrFail($data['id_role']);
                $role->name = $data['name'];
                $role->update();
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

    public function destroy(Role $role)
    {
        $success = false;
        $message = '';

        try {

            $role->delete();
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }

}
