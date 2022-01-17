<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'nama' => 'Master Administrator',
                'username' => 'akimilakuo',
                'password' => Hash::make('akimilakuo'),
                'level' => '0',
                'status' => '1',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ]
        ]);
    }
}