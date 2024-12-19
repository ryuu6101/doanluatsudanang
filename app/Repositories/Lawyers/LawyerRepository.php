<?php

namespace App\Repositories\Lawyers;

use App\Models\Lawyer;
use App\Repositories\BaseRepository;

class LawyerRepository extends BaseRepository implements LawyerRepositoryInterface
{
    public function getModel() {
        return Lawyer::class;
    }
}