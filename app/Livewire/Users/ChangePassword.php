<?php

namespace App\Livewire\Users;

use Livewire\Component;

class ChangePassword extends Component
{
    // Params
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    // Params

    public function rules() {
        return [
            'current_password' => 'required|current_password',
            'new_password' => 'required|confirmed',
        ];
    }

    public function messages() {
        return [
            'current_password.required' => 'Chưa nhập mật khẩu',
            'current_password.current_password' => 'Mật khẩu không chính xác',
            'new_password.required' => 'Chưa nhập mật khẩu mới',
            'new_password.confirmed' => 'Mật khẩu không trùng khớp',
        ];
    }

    public function modalSetup() {
        $this->reset();
        $this->resetErrorBag();
    }

    public function save() {
        $this->validate();
        auth()->user()->update(['password' => bcrypt($this->new_password)]);
        $this->reset();
        $this->dispatch('close-change-password-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: 'Đổi mật khẩu thành công',
        );
    }

    public function render()
    {
        return view('admin.layouts.livewire.change-password');
    }
}
