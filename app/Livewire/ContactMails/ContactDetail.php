<?php

namespace App\Livewire\ContactMails;

use Livewire\Component;
use App\Livewire\ContactMails\ListContactMail;
use App\Repositories\ContactMails\ContactMailRepositoryInterface;

class ContactDetail extends Component
{
    protected $contactMailRepos;

    public $contact_mail;

    public function boot(ContactMailRepositoryInterface $contactMailRepos) {
        $this->contactMailRepos = $contactMailRepos;
    }

    public function modalSetUp($id) {
        $this->contact_mail = $this->contactMailRepos->find($id);
        if (!$this->contact_mail->read) {
            $this->contact_mail->update(['read' => 1]);
            $this->dispatch('refresh')->to(ListContactMail::class);
        }
    }

    public function delete() {
        $this->contact_mail->delete();
        $this->reset('contact_mail');
        $this->dispatch('refresh')->to(ListContactMail::class);
        $this->dispatch('close-contact-detail-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: 'Đã xóa',
        );
    }

    public function mark_unread() {
        $this->contact_mail->update(['read' => 0]);
        $this->dispatch('refresh')->to(ListContactMail::class);
        $this->dispatch('close-contact-detail-modal');
        $this->dispatch('show-message',
            type: 'success', 
            message: 'Đã đánh dấu chưa đọc',
        );
    }

    public function render()
    {
        return view('admin.sections.contact-mails.livewire.contact-detail');
    }
}
