<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123qweasd'),
                'role' => 'admin'
            ],
            [
                'name' => 'UMKM',
                'email' => 'umkm@gmail.com',
                'password' => Hash::make('123qweasd'),
                'role' => 'umkm'
            ]
        ];
        foreach ($data as $value) {
            User::create($value);
        }
    }
}
