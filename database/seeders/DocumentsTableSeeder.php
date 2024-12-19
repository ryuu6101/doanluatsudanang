<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Văn bản mới',
                'slug' => 'van-ban-moi',
            ],
            [
                'name' => 'Hiến pháp',
                'slug' => 'hien-phap',
            ],
            [
                'name' => 'Luật - Pháp lệnh',
                'slug' => 'luat-phap-lenh',
            ],
            [
                'name' => 'Nghị định',
                'slug' => 'nghi-dinh',
            ],
            [
                'name' => 'Thông tư',
                'slug' => 'thong-tu',
            ],
        ];

        Document::truncate();
        Document::insert($data);
    }
}
