<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;

class PostController extends Controller
{
    protected $categoryRepos;
    protected $postRepos;

    public function __construct(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
        $this->postRepos = $postRepos;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'posts',
            'breadcrumb' => '',
        ];

        $categories = $this->categoryRepos->getAll();

        return view('admin.sections.posts.create')->with([
            'categories' => $categories,
            'menu' => $menu,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'contents' => 'nullable',
            'public' => 'nullable',
        ],[
            'title.required' => 'Chưa nhập tiêu đề'
        ]);

        $params['slug'] = Str::slug($request->input('title'));
        $params['thumbnail'] = str_replace(asset(''), '', $request->input('thumbnail'));
        if ($request->input('published')) {
            $message = 'Đã đăng bài viết';
            if ($request->input('published_at') == 'Bây giờ') {
                $params['published_at'] = now();
            } else {
                $params['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $request->input('published_at'));
            }
        } else {
            $message = 'Đã lưu bản nháp bài viết';
        }

        $this->postRepos->create($params);

        return redirect()->route('admin.posts.index')->with('noty', [
            'type' => 'success',
            'message' => $message,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->postRepos->find($id);

        $menu = [
            'submenu' => 'post-manager',
            'sidebar' => 'posts',
            'breadcrumb' => '',
        ];

        $categories = $this->categoryRepos->getAll();

        return view('admin.sections.posts.edit')->with([
            'post' => $post,
            'categories' => $categories,
            'menu' => $menu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $params = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'category_id' => 'nullable',
            'contents' => 'nullable',
            'public' => 'nullable',
        ],[
            'title.required' => 'Chưa nhập tiêu đề'
        ]);

        $params['slug'] = Str::slug($request->input('title'));
        $params['thumbnail'] = str_replace(asset(''), '', $request->input('thumbnail'));
        if ($request->input('published') == null) {
            $message = 'Đã cập nhật bài viết';
            $params['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $request->input('published_at'));
        } elseif ($request->input('published')) {
            $message = 'Đã đăng bài viết';
            if ($request->input('published_at') == 'Bây giờ') {
                $params['published_at'] = now();
            } else {
                $params['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $request->input('published_at'));
            }
        } else {
            $message = 'Đã lưu bản nháp bài viết';
        }

        $post = $this->postRepos->find($id);
        $post->update($params);

        return redirect()->route('admin.posts.index')->with('noty', [
            'type' => 'success',
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
