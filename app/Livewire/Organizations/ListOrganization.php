<?php

namespace App\Livewire\Organizations;

use Livewire\Component;
use Livewire\WithPagination;
use App\Repositories\Organizations\OrganizationRepositoryInterface;

class ListOrganization extends Component
{
    use WithPagination;

    protected $organizationRepos;

    public $paginate = 10;
    public $params = [];

    protected $listeners = ['refresh' => '$refresh', 'search'];

    public function boot(OrganizationRepositoryInterface $organizationRepos) {
        $this->organizationRepos = $organizationRepos;
    }

    public function search($params) {
        $this->params = $params;
    }

    public function updatedPaginate() {
        $this->resetPage();
    }

    public function render()
    {
        $organizations = $this->organizationRepos->filter($this->params, $this->paginate);
        return view('admin.sections.organizations.livewire.list-organization')->with(['organizations' => $organizations]);
    }
}
