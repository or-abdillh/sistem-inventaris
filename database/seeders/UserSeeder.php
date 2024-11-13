<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // memasukkan data user ke dalam table users
        DB::table("users")->insert([
            "name" => "Oka Rajeb Abdillah",
            "email" => "my.email@mail.com",
            "password" => Hash::make("password")
        ]);
    }
}
