<?php

namespace App\Http\Controllers\Admin;

use App\Mail\ResponseEmail;
use App\Models\ContactMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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

    public function users() {
        $menu = [
            'submenu' => 'account-manager',
            'sidebar' => 'users',
            'title' => 'Quản lý tài khoản',
            'breadcrumb' => ['Tài khoản', 'Quản lý tài khoản'],
        ];

        return view('admin.sections.users.index')->with(['menu' => $menu]);
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

    public function contactMails() {
        $menu = [
            'sidebar' => 'contact-mails',
            'title' => 'Liên hệ',
            'breadcrumb' => ['Liên hệ'],
        ];

        return view('admin.sections.contact-mails.index')->with(['menu' => $menu]);
    }

    public function response(?ContactMail $contact_mail = null) {
        $menu = [
            'sidebar' => 'contact-mails',
            'title' => 'Liên hệ',
            'breadcrumb' => ['Liên hệ'],
        ];

        return view('admin.sections.contact-mails.response')->with([
            'menu' => $menu,
            'contact_mail' => $contact_mail,
        ]);
    }

    public function sendResponse(Request $request) {
        Mail::to($request->input('email'))->send(new ResponseEmail([
            'title' => $request->input('title'),
            'contents' => $request->input('contents'),
        ]));

        return redirect()->route('admin.contact_mails.index')->with('noty', [
            'type' => 'success',
            'message' => 'Đã gửi phản hồi',
        ]);
    }

    public function fileManager() {
        $menu = [
            'sidebar' => 'file-manager',
            'title' => 'Quản lý file',
            'breadcrumb' => ['Quản lý file'],
        ];

        return view('admin.sections.file-manager.index')->with(['menu' => $menu]);
    }

    public function siteConfig() {
        $menu = [
            'sidebar' => 'site-config',
            'title' => 'Thông tin website',
            'breadcrumb' => ['Thông tin website'],
        ];
        
        return view('admin.sections.site-config.index')->with(['menu' => $menu]);
    }
}
