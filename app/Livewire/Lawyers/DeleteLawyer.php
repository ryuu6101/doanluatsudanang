<?php

namespace App\Livewire\Lawyers;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Lawyers\ListLawyer;
use App\Repositories\Lawyers\LawyerRepositoryInterface;

class DeleteLawyer extends Component
{
    protected $lawyerRepos;

    public $lawyer;

    public function boot(LawyerRepositoryInterface $lawyerRepos) {
        $this->lawyerRepos = $lawyerRepos;
    }

    public function modalSetup($id) {
        $this->lawyer = $this->lawyerRepos->find(abs($id));
    }

    public function delete() {
        $this->lawyer->delete();
        $this->postCrud('Đã xóa luật sư');
    }

    public function postCrud($message = 'Success') {
        $this->reset('lawyer');
        $this->dispatch('refresh')->to(ListPost::class);
        $this->dispatch('close-delete-lawyer-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.lawyers.livewire.delete-lawyer');
    }
}
