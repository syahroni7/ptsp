<?php

namespace App\Http\Controllers\DataPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DateTime;
use DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
            $users = User::with('roles')->get();

            return Datatables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $btn = '<button id="editBtn" type="button" class="btn btn-sm btn-warning btn-xs" data-bs-toggle="modal" data-bs-target="#fModal" data-bs-title="Edit Data Pengguna" data-title="Edit Data Pengguna"><i class="bi bi-pencil-square"></i></button>&nbsp;';
                    $btn .= '<button id="destroyBtn" type="button" class="btn btn-sm btn-danger btn-xs" data-bs-user_id="'. $user->id  .'" data-user_id="'.  $user->id  .'"><i class="bi bi-trash-fill"></i></button>';
                    return $btn;
                })
                ->addColumn('roles_detail', function ($user) {
                    $roles = $user->getRoleNames();
                    $btn = '<ul class="ul-ba">';
                    foreach ($roles as $role) {
                        $btn .= '<li>' . $role . '</li>';
                    }
                    $btn .= '</ul>';
                    return $btn;
                })
                ->editColumn('block_html', function ($user) {
                    $indicator = $user->block == 'no' ? 'bg-primary' : 'bg-danger';
                    return '<span class="badge ' . $indicator . '">' . strtoupper($user->block) . '</span>';
                })
                ->editColumn('status_html', function ($user) {
                    $indicator = $user->status == 'active' ? 'bg-success' : 'bg-danger';
                    return '<span class="badge ' . $indicator . '">' . strtoupper($user->status) . '</span>';
                })
                ->rawColumns(['action', 'roles_detail', 'block_html', 'status_html'])
                ->make(true);
        }


        $all_roles = \Spatie\Permission\Models\Role::all()->pluck('name');
        return view('admin.users.data.index', [
            'title'  => 'Daftar Pengguna Sistem PTSP',
            'br1'  => 'Kelola',
            'br2'  => 'Data Pengguna',
            'all_roles' => $all_roles
        ]);
    }

    public function store(Request $request)
    {
        $success = 'nope';
        $message = '';
        $code = 400;

        $data = $request->input();

        try {
            if ($data['id_user'] == '') {
                $user = new User();
                $user->name = $data['name'];
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->password = Hash::make($data['password']);
                $user->save();
                
            } else {
                $user = User::findOrFail($data['id_user']);
                
                unset($data['id_user']);
                $user->name = $data['name'];
                $user->username = $data['username'];
                $user->email = $data['email'];
                $user->block = $data['block'];
                $user->status = $data['status'];
                if($data['password'] != '') {
                    $data['password'] = Hash::make($data['password']);
                    $user->password = $data['password'];
                } else {
                    unset($data['password']);
                }
                $user->save();
            }

            $user->fresh();
            $user->syncRoles($data['roles']);

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

    public function destroy(User $user)
    {
        $success = false;
        $message = '';

        try {

            $user->delete();
            $success = true;
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()
            ->json(['success' => $success, 'message' => $message]);
    }
}
