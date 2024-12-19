<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Đoàn Luật sư Đà Nẵng',
                'slug' => 'doan-luat-su-da-nang',
                'phone' => '+02362473004',
                'email' => 'doanluatsu43@gmail.com',
            ],
        ];

        Organization::truncate();
        Organization::insert($data);
    }
}
