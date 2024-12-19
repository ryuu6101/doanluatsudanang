<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function dashboard() {
        $menu = [
            'sidebar' => 'dashboard',
            'title' => 'Trang chủ',
            'breadcrumb' => ['Trang chủ'],
        ];

        return view('admin.sections.dashboard.index')->with(['menu' => $menu]);
    }

    public function categories() {
        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'categories',
            'title' => 'Danh mục',
            'breadcrumb' => ['Bài viết', 'Danh mục'],
        ];

        return view('admin.sections.categories.index')->with(['menu' => $menu]);
    }

    public function posts() {
        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'posts',
            'title' => 'Quản lý bài viết',
            'breadcrumb' => ['Bài viết', 'Quản lý bài viết'],
        ];

        return view('admin.sections.posts.index')->with(['menu' => $menu]);
    }

    public function organizations() {
        $menu = [
            'submenu' => 'personnel-manager',
            'sidebar' => 'organizations',
            'title' => 'Tổ chức',
            'breadcrumb' => ['Nhân sự', 'Tổ chức'],
        ];

        return view('admin.sections.organizations.index')->with(['menu' => $menu]);
    }

    public function lawyers() {
        $menu = [
            'submenu' => 'personnel-manager',
            'sidebar' => 'lawyers',
            'title' => 'Quản lý luật sư',
            'breadcrumb' => ['Nhân sự', 'Quản lý luật sư'],
        ];

        return view('admin.sections.lawyers.index')->with(['menu' => $menu]);
    }

    public function fileManager() {
        $menu = [
            'sidebar' => 'file-manager',
            'title' => 'Quản lý file',
            'breadcrumb' => ['Quản lý file'],
        ];

        return view('admin.sections.file-manager.index')->with(['menu' => $menu]);
    }
}
