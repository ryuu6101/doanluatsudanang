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
    public $site_name;
    public $site_email;

    public function mount() {
        $this->getData();
    }

    public function getData() {
        $config = DB::table('site_configs')->first();

        $this->company_name = $config->company_name ?? '';
        $this->address = $config->address ?? '';
        $this->phone = $config->phone ?? '';
        $this->email = $config->email ?? '';
        $this->site_name = $config->site_name ?? '';
        $this->site_email = $config->site_email ?? '';
    }

    public function save() {
        $config = DB::table('site_configs')->limit(1);
        $params = [
            'company_name' => $this->company_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'site_name' => $this->site_name,
            'site_email' => $this->site_email,
        ];

        if ($config->count() > 0) {
            $config->update($params);
        } else {
            DB::table('site_configs')->insert($params);
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
