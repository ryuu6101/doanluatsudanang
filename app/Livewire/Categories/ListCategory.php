<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Categories\CategoryRepositoryInterface;

class ListCategory extends Component
{
    use WithPagination;

    protected $categoryRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(CategoryRepositoryInterface $categoryRepos) {
        $this->categoryRepos = $categoryRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function updatedPaginate() {
        $this->resetPage();
    }

    public function render()
    {
        $categories = $this->categoryRepos->filter($this->params, $this->paginate);
        return view('admin.sections.categories.livewire.list-category')->with(['categories' => $categories]);
    }
}
