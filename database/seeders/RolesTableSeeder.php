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

        // Staff
        $canStaffs = User::whereIn('username', 
        [
            '197505152005012003',
            '198006222014112002',
            '197406142007101001',
            '198212262005011004',
            '198003162007102002',
            '197205062007101002',
            '197208212000032003',
            '197706292007102008', 
            '197901012007101004', 
            '198505202014122005', 
            '197406142007101001',
            '197606082009121001',
            '198705122011012008',
            '198210132007102002',
            '198212152005011002',
            'Meiriza',
            'Fauzhi',
            '198104122009012004',
            '197101152007102002',
            '198004142007102006',
            '197809292005012003',
            '196508281989032001',
            ])->get();
        $canStaffs->each(function ($user) {
            $user->assignRole('staff');
        });


        // Permissions
        $permissionMenu1 = Permission::create(['name' => 'menu-dashboard']);
        $permissionMenu2 = Permission::create(['name' => 'menu-pelayanan']);
        $permissionMenu3 = Permission::create(['name' => 'menu-arsip']);
        $permissionMenu4 = Permission::create(['name' => 'menu-disposisi']);
        $permissionMenu5 = Permission::create(['name' => 'menu-main']);
        $permissionMenu6 = Permission::create(['name' => 'menu-layanan']);

        $permissionPage1_1 = Permission::create(['name' => 'page-dashboard']);

        $permissionPage2_1 = Permission::create(['name' => 'page-pelayanan-input']);
        $permissionPage2_2 = Permission::create(['name' => 'page-pelayanan-list']);

        $permissionPage3_1 = Permission::create(['name' => 'page-arsip-pelayanan']);

        $permissionPage4_1 = Permission::create(['name' => 'page-disposisi-master']);
        $permissionPage4_2 = Permission::create(['name' => 'page-disposisi-list']);

        $permissionPage5_1 = Permission::create(['name' => 'page-main-permission']);
        $permissionPage5_2 = Permission::create(['name' => 'page-main-user-data']);
        $permissionPage5_3 = Permission::create(['name' => 'page-main-user-role']);
        $permissionPage5_4 = Permission::create(['name' => 'page-main-unit_pengolah']);

        $permissionPage6_1 = Permission::create(['name' => 'page-layanan-jenis']);
        $permissionPage6_2 = Permission::create(['name' => 'page-layanan-output']);
        $permissionPage6_3 = Permission::create(['name' => 'page-layanan-daftar']);
        $permissionPage6_4 = Permission::create(['name' => 'page-layanan-syarat-master']);
        $permissionPage6_5 = Permission::create(['name' => 'page-layanan-syarat-list']);

        $super_administrator->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu3, $permissionMenu4, $permissionMenu5, $permissionMenu6,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage3_1,
            $permissionPage4_1, $permissionPage4_2,
            $permissionPage5_1, $permissionPage5_2, $permissionPage5_3, $permissionPage5_4,
            $permissionPage6_1, $permissionPage6_2, $permissionPage6_3, $permissionPage6_4, $permissionPage6_5,
        ]);

        $administrator->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu6,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage3_1,
            $permissionPage6_1, $permissionPage6_2, $permissionPage6_3, $permissionPage6_4, $permissionPage6_5,
        ]);


        $operator->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu3,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage3_1,
        ]);

        $director->givePermissionTo([
            $permissionMenu1, $permissionMenu4,
            $permissionPage1_1,
            $permissionPage4_1, $permissionPage4_2,
        ]);

        $manager->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu4,
            $permissionPage1_1,
            $permissionPage2_1, $permissionPage2_2,
            $permissionPage4_1, $permissionPage4_2,
        ]);

        $supervisor->givePermissionTo([
            $permissionMenu1, $permissionMenu4,
            $permissionPage1_1,
            $permissionPage4_1, $permissionPage4_2,
        ]);

        $staff->givePermissionTo([
            $permissionMenu1, $permissionMenu2, $permissionMenu3, $permissionMenu4, $permissionMenu6,
            $permissionPage1_1,
            $permissionPage2_2,
            $permissionPage3_1,
            $permissionPage4_1, $permissionPage4_2,
            $permissionPage6_3, $permissionPage6_4, $permissionPage6_5,
        ]);
    }
}
