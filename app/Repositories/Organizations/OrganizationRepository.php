<?php

namespace App\Repositories\Organizations;

use App\Models\Organization;
use App\Repositories\BaseRepository;

class OrganizationRepository extends BaseRepository implements OrganizationRepositoryInterface
{
    public function getModel() {
        return Organization::class;
    }
}