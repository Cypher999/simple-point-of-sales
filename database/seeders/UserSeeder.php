<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                "username"=>"administrator",
                "role"=>"superadmin",
                "password"=>Hash::make('12345')
            ],
            [
                "username"=>"administrator gudang",
                "role"=>"admin gudang",
                "password"=>Hash::make('12345')
            ],
            [
                "username"=>"administrator penjualan",
                "role"=>"admin penjualan",
                "password"=>Hash::make('12345')
            ]
        ];
        DB::table('user')->insert($data);
    }
}
