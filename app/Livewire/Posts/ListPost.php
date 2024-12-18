<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Posts\PostRepositoryInterface;

class ListPost extends Component
{
    use WithPagination;

    protected $postRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(PostRepositoryInterface $postRepos) {
        $this->postRepos = $postRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function updatedPaginate() {
        $this->resetPage();
    }

    public function render()
    {
        $posts = $this->postRepos->filter($this->params, $this->paginate);
        return view('admin.sections.posts.livewire.list-post')->with(['posts' => $posts]);
    }
}
