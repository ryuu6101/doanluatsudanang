<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Posts\ListPost;
use App\Repositories\Posts\PostRepositoryInterface;

class DeletePost extends Component
{
    protected $postRepos;

    public $post;

    public function boot(PostRepositoryInterface $postRepos) {
        $this->postRepos = $postRepos;
    }

    public function modalSetup($id) {
        $this->post = $this->postRepos->find(abs($id));
    }

    public function delete() {
        $this->post->forceDelete();
        $this->postCrud('Đã xóa bài viết');
    }

    public function trash() {
        $this->post->delete();
        $this->postCrud('Đã chuyển bài viết vào mục thùng rác');
    }

    public function postCrud($message = 'Success') {
        $this->reset('post');
        $this->dispatch('refresh')->to(ListPost::class);
        $this->dispatch('close-delete-post-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.posts.livewire.delete-post');
    }
}
