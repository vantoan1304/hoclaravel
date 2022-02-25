<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admins\Admin;
use Illuminate\Support\Facades\Hash;

class InsertAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = '123456';
        DB::table('admins')->insert([
            'email' => 'vantoan1304@gmail.com',
            'password' => Hash::make($password),
            'status'    => 1
        ]);
    }
}
