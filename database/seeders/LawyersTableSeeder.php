<?php

namespace Database\Seeders;

use App\Models\Lawyer;
use App\Imports\LawyersImport;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LawyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lawyer::truncate();

        $file = asset('excel/luat-su.xlsx');
        $import = new LawyersImport;
        \Excel::import($import, public_path('excel/luat-su.xlsx'));
    }
}
