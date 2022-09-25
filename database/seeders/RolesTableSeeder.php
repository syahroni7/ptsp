<?php

namespace Database\Seeders;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use \App\Models\User;

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

        
    }
}
