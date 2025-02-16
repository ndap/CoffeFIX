<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' =>'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin12345'),
                'role' => 'admin',
            ],
            [
                'name' =>'user',
                'email' => 'rino@gmail.com',
                'password' => bcrypt('user12345'),
                'role' => 'user',
            ]
        ];

        foreach ($data as $key => $kontol) {
            User::create($kontol);
        }
    }
}
