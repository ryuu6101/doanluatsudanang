<?php

namespace App\Livewire\MailConfig;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class MailConfig extends Component
{
    public $username;
    public $password;
    public $from_address;
    public $from_name;

    public function mount() {
        $this->getData();
    }

    public function getData() {
        $config = DB::table('mail_configs')->first();

        $this->username = $config->username ?? '';
        $this->password = $config->password ?? '';
        $this->from_address = $config->from_address ?? '';
        $this->from_name = $config->from_name ?? '';
    }

    public function save() {
        $config = DB::table('mail_configs')->limit(1);
        $params = [
            'username' => $this->username,
            'password' => $this->password,
            'from_address' => $this->from_address,
            'from_name' => $this->from_name,
        ];

        if ($config->count() > 0) {
            $config->update($params);
        } else {
            DB::table('mail_configs')->insert($params);
        }

        $this->dispatch('show-message',
            type: 'success', 
            message: 'Đã lưu cấu hình',
        );

        $this->getData();
    }

    public function render()
    {
        return view('admin.sections.mail-config.livewire.mail-config');
    }
}
