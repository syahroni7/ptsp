<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Nonaktifkan pengecekan foreign key untuk sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Panggil semua seeder yang dibutuhkan
        $this->call([
            AccessTypeSeeder::class,
            UsersTableSeeder::class,
            RolesTableSeeder::class,
            MasterDisposisiSeeder::class,
            LayananTableSeeder::class,
            SyaratLayananTableSeeder::class,
        ]);

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
