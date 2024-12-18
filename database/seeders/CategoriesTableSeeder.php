<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Giới thiệu',
                'slug' => 'gioi-thieu',
            ],
            [
                'name' => 'Tin hoạt động',
                'slug' => 'tin-hoat-dong',
            ],
            [
                'name' => 'Thông báo thông tin',
                'slug' => 'thong-bao-thong-tin',
            ],
            [
                'name' => 'Đảng ủy',
                'slug' => 'dang-uy',
            ],
            [
                'name' => 'HĐKT - KL',
                'slug' => 'hdkt-kl',
            ],
            [
                'name' => 'Ban chủ nhiệm',
                'slug' => 'ban-chu-nhiem',
            ],
            [
                'name' => 'Quy chế quy định',
                'slug' => 'quy-che-quy-dinh',
            ],
            [
                'name' => 'Trao đổi bài viết',
                'slug' => 'trao-doi-bai-viet',
            ],
            [
                'name' => 'Tin tức - sự kiện',
                'slug' => 'tin-tuc-su-kien',
            ],
            [
                'name' => 'Bản tin ngày nay',
                'slug' => 'ban-tin-ngay-nay',
            ],
            [
                'name' => 'Văn bản chính sách',
                'slug' => 'van-ban-chinh-sach',
            ],
            [
                'name' => 'Tư vấn pháp luật',
                'slug' => 'tu-van-phap-luat',
            ],
            [
                'name' => 'Pháp luật về luật sư',
                'slug' => 'phap-luat-ve-luat-su',
            ],
            [
                'name' => 'Văn bản mới',
                'slug' => 'van-ban-moi',
            ],
        ];

        Category::truncate();
        Category::insert($data);
    }
}
