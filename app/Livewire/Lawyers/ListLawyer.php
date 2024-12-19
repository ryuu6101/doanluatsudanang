<?php

namespace App\Livewire\Lawyers;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Lawyers\LawyerRepositoryInterface;

class ListLawyer extends Component
{
    use WithPagination;

    protected $lawyerRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(LawyerRepositoryInterface $lawyerRepos) {
        $this->lawyerRepos = $lawyerRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function updatedPaginate() {
        $this->resetPage();
    }

    public function render()
    {
        $lawyers = $this->lawyerRepos->filter($this->params, $this->paginate);
        return view('admin.sections.lawyers.livewire.list-lawyer')->with(['lawyers' => $lawyers]);
    }
}
