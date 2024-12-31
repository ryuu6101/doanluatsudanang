<?php

namespace App\Repositories\ContactMails;

use App\Models\ContactMail;
use App\Repositories\BaseRepository;

class ContactMailRepository extends BaseRepository implements ContactMailRepositoryInterface
{
    public function getModel() {
        return ContactMail::class;
    }
}