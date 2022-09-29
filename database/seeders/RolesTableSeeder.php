<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_administrator = Role::create(['name' => 'super_administrator']);
        $administrator = Role::create(['name' => 'administrator']);
        $operator = Role::create(['name' => 'operator']);
        $director = Role::create(['name' => 'director']);
        $manager = Role::create(['name' => 'manager']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $staff = Role::create(['name' => 'staff']);

        // Super Admin
        $user = User::where('username', '199407292022031002')->first();
        $user->assignRole('super_administrator', 'administrator');

        // Pimpinan
        $user = User::where('username', '197105141995031001')->first();
        $user->assignRole('director');

        // Kasubag TU
        $user = User::where('username', '198008042005011007')->first();
        $user->assignRole('manager');

        // Seksi
        $users = User::whereIn('username', ['197202112003121003', '197202051997031003', '196706191994031004', '197107051998031013', '198106122008011013', '196906151996032002'])->get();
        $users->each(function ($user) {
            $user->assignRole('supervisor');
        });

        // Operator
        $user = User::where('username', 'mardiyana')->first();
        $user->assignRole('operator');


        // Permissions
        $permissionMenu1 = Permission::create(['name' => 'menu-dashboard']);
        $permissionMenu2 = Permission::create(['name' => 'menu-pelayanan']);
        $permissionMenu3 = Permission::create(['name' => 'menu-disposisi']);
        $permissionMenu4 = Permission::create(['name' => 'menu-main']);
        $permissionMenu5 = Permission::create(['name' => 'menu-layanan']);

        $permissionPage1_1 = Permission::create(['name' => 'page-dashboard']);

        $permissionPage2_1 = Permission::create(['name' => 'page-pelayanan-input']);
        $permissionPage2_2 = Permission::create(['name' => 'page-pelayanan-list']);

        $permissionPage3_1 = Permission::create(['name' => 'page-disposisi-master']);
        $permissionPage3_2 = Permission::create(['name' => 'page-disposisi-list']);

        $permissionPage4_1 = Permission::create(['name' => 'page-main-permission']);
        $permissionPage4_2 = Permission::create(['name' => 'page-main-user-data']);
        $permissionPage4_3 = Permission::create(['name' => 'page-main-user-role']);
        $permissionPage4_4 = Permission::create(['name' => 'page-main-unit_pengolah']);
        
        $permissionPage5_1 = Permission::create(['name' => 'page-layanan-jenis']);
        $permissionPage5_2 = Permission::create(['name' => 'page-layanan-output']);
        $permissionPage5_3 = Permission::create(['name' => 'page-layanan-daftar']);
        $permissionPage5_4 = Permission::create(['name' => 'page-layanan-syarat-master']);
        $permissionPage5_5 = Permission::create(['name' => 'page-layanan-syarat-list']);

        $super_administrator->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu3, $permissionMenu4, $permissionMenu5,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage3_1, $permissionPage3_2,
            $permissionPage4_1, $permissionPage4_2, $permissionPage4_3, $permissionPage4_4,
            $permissionPage5_1, $permissionPage5_2, $permissionPage5_3, $permissionPage5_4, $permissionPage5_5,
        ]);

        $administrator->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu5,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage5_1, $permissionPage5_2, $permissionPage5_3, $permissionPage5_4, $permissionPage5_5,
        ]);


        $operator->givePermissionTo([
            $permissionMenu1, $permissionMenu2,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
        ]);

        $director->givePermissionTo([
            $permissionMenu1, $permissionMenu3,
            $permissionPage1_1,
            $permissionPage3_1, $permissionPage3_2,
        ]);

        $manager->givePermissionTo([
            $permissionMenu1, $permissionMenu3,
            $permissionPage1_1,
            $permissionPage3_1, $permissionPage3_2,
        ]);

        $supervisor->givePermissionTo([
            $permissionMenu1, $permissionMenu3,
            $permissionPage1_1,
            $permissionPage3_1, $permissionPage3_2,
        ]);

        $staff->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu3,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage3_1, $permissionPage3_2,
        ]);
    }
}
