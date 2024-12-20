<?php

namespace App\Livewire\Lawyers;

use Livewire\Component;
use App\Repositories\Lawyers\LawyerRepositoryInterface;

class LawyerInfo extends Component
{
    protected $lawyerRepos;

    public $lawyer;

    public function boot(LawyerRepositoryInterface $lawyerRepos) {
        $this->lawyerRepos = $lawyerRepos;
    }

    public function modalSetUp($id) {
        $this->lawyer = $this->lawyerRepos->find($id);
    }

    public function render()
    {
        return view('admin.sections.lawyers.livewire.lawyer-info');
    }
}
