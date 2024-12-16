<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function dashboard() {
        $menu = [
            'sidebar' => 'dashboard',
            'breadcrumb' => 'Trang chủ',
        ];

        return view('admin.sections.dashboard.index')->with(['menu' => $menu]);
    }
}
