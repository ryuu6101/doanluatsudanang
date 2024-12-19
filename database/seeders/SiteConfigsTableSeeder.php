<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiteConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'company_name' => 'ĐOÀN LUẬT SƯ THÀNH PHỐ ĐÀ NẴNG',
                'address' => '91 Yên Bái , P.Phước Ninh , Q.Hải Châu , TP.Đà Nẵng',
                'phone' => '+02362473004',
                'email' => 'doanluatsu43@gmail.com',
            ],
        ];

        SiteConfig::truncate();
        SiteConfig::insert($data);
    }
}
