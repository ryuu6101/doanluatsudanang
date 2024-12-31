<?php

namespace App\Livewire\ContactMails;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\ContactMails\ContactMailRepositoryInterface;

class ListContactMail extends Component
{
    use WithPagination;

    protected $contactMailRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(ContactMailRepositoryInterface $contactMailRepos) {
        $this->contactMailRepos = $contactMailRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function updatedPaginate() {
        $this->resetPage();
    }

    public function render()
    {
        $contact_mails = $this->contactMailRepos->filter($this->params)->sortBy('read')->paginate($this->paginate);
        return view('admin.sections.contact-mails.livewire.list-contact-mail')->with(['contact_mails' => $contact_mails]);
    }
}
