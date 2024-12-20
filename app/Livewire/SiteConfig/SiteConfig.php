<?php

namespace App\Livewire\SiteConfig;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SiteConfig extends Component
{
    public $company_name;
    public $address;
    public $phone;
    public $email;

    public function mount() {
        $this->getData();
    }

    public function getData() {
        $config = DB::table('site_configs')->first();

        $this->company_name = $config->company_name ?? '';
        $this->address = $config->address ?? '';
        $this->phone = $config->phone ?? '';
        $this->email = $config->email ?? '';
    }

    public function save() {
        $config = DB::table('site_configs')->limit(1);
        $params = [
            'company_name' => $this->company_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
        ];

        if ($config) {
            $config->update($params);
        } else {
            DB::table('site_config')->create($params);
        }

        $this->dispatch('show-message',
            type: 'success', 
            message: 'Đã lưu thông tin website',
        );

        $this->getData();
    }

    public function render()
    {
        return view('admin.sections.site-config.livewire.site-config');
    }
}
