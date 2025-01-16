<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Attachments\AttachmentRepositoryInterface;

class PostController extends Controller
{
    protected $categoryRepos;
    protected $postRepos;
    protected $attachmentRepos;

    public function __construct(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
        AttachmentRepositoryInterface $attachmentRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
        $this->postRepos = $postRepos;
        $this->attachmentRepos = $attachmentRepos;
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
            'title' => 'Thêm bài viết mới',
            'breadcrumb' => ['Bài viết', 'Quản lý bài viết', 'Thêm bài viết mới'],
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
            'thumbnail_description' => 'nullable',
            'thumbnail_position' => 'nullable',
        ],[
            'title.required' => 'Chưa nhập tiêu đề'
        ]);

        $params['user_id'] = auth()->user()->id;
        // $params['slug'] = Str::slug($request->input('title'));
        $params['thumbnail'] = str_replace(asset(''), '', $request->input('thumbnail'));
        if ($request->input('publish')) {
            $message = 'Đã đăng bài viết';
            if ($request->input('published_at') == '') {
                $params['published_at'] = now();
            } else {
                $params['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $request->input('published_at'))->format('Y-m-d H:i');
            }
        } else {
            $message = 'Đã lưu bản nháp bài viết';
        }

        $post = $this->postRepos->create($params);
        $post->update(['slug' => Str::slug($request->input('title')).'-'.$post->id]);

        if ($request->input('attachments')) {
            $index = 1;
            foreach ($request->input('attachments') as $name => $file) {
                $file = str_replace(asset(''), '', $file);
                $this->attachmentRepos->create([
                    'name' => $name,
                    'file' => $file,
                    'post_id' => $post->id,
                    'index' => $index++,
                ]);
            }
        }

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
            'title' => 'Chỉnh sửa bài viết',
            'breadcrumb' => ['Bài viết', 'Quản lý bài viết', 'Chỉnh sửa bài viết'],
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
            'thumbnail_description' => 'nullable',
            'thumbnail_position' => 'nullable',
        ],[
            'title.required' => 'Chưa nhập tiêu đề'
        ]);

        $params['slug'] = Str::slug($request->input('title')).'-'.$id;
        $params['thumbnail'] = str_replace(asset(''), '', $request->input('thumbnail'));

        if ($request->input('published_at') == '') {
            $params['published_at'] = now();
        } else {
            $params['published_at'] = Carbon::createFromFormat('d/m/Y H:i', $request->input('published_at'))->format('Y-m-d H:i');
        }

        if ($request->input('publish') == null) {
            $message = 'Đã cập nhật bài viết';
        } elseif ($request->input('publish')) {
            $message = 'Đã đăng bài viết';
        } else {
            $message = 'Đã lưu bản nháp bài viết';
            unset($params['published_at']);
        }

        $post = $this->postRepos->find($id);
        $post->update($params);

        if ($request->input('attachments')) {
            $attachment_ids = [];
            $index = 1;
            foreach ($request->input('attachments') as $name => $file) {
                $file = str_replace(asset(''), '', $file);
                $attachment = $this->attachmentRepos->updateOrCreate([
                    'name' => $name,
                    'file' => $file,
                    'post_id' => $id,
                ],[
                    'index' => $index++,
                ]);

                $attachment_ids[] = $attachment->id;
            }

            $post->attachments()->whereNotIn('id', $attachment_ids)->delete();
        }

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
        $this->postRepos->delete($id);
        return redirect()->route('admin.posts.index')->with('noty', [
            'type' => 'success',
            'message' => 'Bài viết đã được đưa đến mục thùng rác',
        ]);
    }
}
