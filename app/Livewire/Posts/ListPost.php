<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;

class ListPost extends Component
{
    use WithPagination;

    protected $categoryRepos;
    protected $postRepos;

    public $paginate = 10;
    public $params = [];
    public $categories;

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function mount() {
        $this->categories = $this->categoryRepos->getAll();
    }

    public function boot(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
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
        $posts = $this->postRepos->filter($this->params)->sortByDesc('published_at')->paginate($this->paginate);
        return view('admin.sections.posts.livewire.list-post')->with(['posts' => $posts]);
    }
}
