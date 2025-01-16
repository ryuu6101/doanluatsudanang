<?php

namespace App\Livewire\Organizations;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Livewire\Organizations\ListOrganization;
use App\Repositories\Organizations\OrganizationRepositoryInterface;

class CrudOrganization extends Component
{
    protected $organizationRepos;

    public $organization;
    public $action;

    // Params
    public $name;
    public $phone;
    public $email;
    // Params

    public function boot(OrganizationRepositoryInterface $organizationRepos) {
        $this->organizationRepos = $organizationRepos;
    }

    public function rules() {
        return [
            'name' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên tổ chức',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
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

        $this->organization = $this->organizationRepos->find(abs($id));

        if ($id < 0) return;
        $this->resetErrorBag();
        $this->getData();
    }

    public function getData() {
        $this->name = $this->organization->name ?? '';
        $this->phone = $this->organization->phone ?? '';
        $this->email = $this->organization->email ?? '';
    }

    public function create() {
        $this->resetErrorBag();
        $params = $this->validate();
        // $params['slug'] = Str::slug($params['name'], '-');
        $organization = $this->organizationRepos->create($params);
        $organization->update(['slug' => Str::slug($params['name'], '-').'-'.$organization->id]);
        $this->postCrud('Đã thêm tổ chức');
    }

    public function update() {
        $this->resetErrorBag();
        $params = $this->validate();
        $params['slug'] = Str::slug($params['name'], '-').'-'.$this->organization->id;
        $this->organization->update($params);
        $this->postCrud('Đã cập nhật thông tin tổ chức');
    }

    public function delete() {
        $this->organization->delete();
        $this->postCrud('Đã xóa tổ chức');
    }

    public function postCrud($message = 'Success') {
        $this->reset('organization', 'action');
        $this->dispatch('refresh')->to(ListOrganization::class);
        $this->dispatch('close-crud-organization-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: $message,
        );
    }

    public function render()
    {
        return view('admin.sections.organizations.livewire.crud-organization');
    }
}
