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

    public function categories() {
        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'categories',
            'breadcrumb' => '',
        ];

        return view('admin.sections.categories.index')->with(['menu' => $menu]);
    }

    public function posts() {
        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'posts',
            'breadcrumb' => '',
        ];

        return view('admin.sections.posts.index')->with(['menu' => $menu]);
    }
}
