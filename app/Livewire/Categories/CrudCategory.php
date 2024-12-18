<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Categories\ListCategory;
use App\Repositories\Categories\CategoryRepositoryInterface;

class CrudCategory extends Component
{
    protected $categoryRepos;

    public $category;
    public $action;

    // Params
    public $name;
    // Params

    public function boot(CategoryRepositoryInterface $categoryRepos) {
        $this->categoryRepos = $categoryRepos;
    }

    public function rules() {
        return [
            'name' => ['required'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên danh mục.',
        ];
    }

    public function modalSetup($id) {
        if ($id > 0) {
            $this->action = 'update';
        } elseif ($id < 0) {
            $this->action = 'delete';
        } else {
            $this->action = 'create';
        }

        $this->category = $this->categoryRepos->find(abs($id));

        if ($id < 0) return;
        $this->resetErrorBag();
        $this->getData();
    }

    public function getData() {
        $this->name = $this->category->name ?? '';
    }

    public function create() {
        $this->resetErrorBag();
        $params = $this->validate();
        $params['slug'] = Str::slug($params['name'], '-');
        $category = $this->categoryRepos->create($params);
        $this->postCrud('Đã thêm danh mục');
    }

    public function update() {
        $this->resetErrorBag();
        $params = $this->validate();
        $params['slug'] = Str::slug($params['name'], '-');
        $this->category->update($params);
        $this->postCrud('Đã cập nhật danh mục');
    }

    public function delete() {
        $this->category->delete();
        $this->postCrud('Đã xóa danh mục');
    }

    public function postCrud($message = 'Success') {
        $this->reset('category', 'action');
        $this->dispatch('refresh')->to(ListCategory::class);
        $this->dispatch('close-crud-category-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.categories.livewire.crud-category');
    }
}
