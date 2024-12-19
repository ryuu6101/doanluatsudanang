<?php

namespace App\Filters;

class LawyerFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'slug',
        'card_number',
        'workplace',
        'organization_id',
    ];
    
    public function filterFullname($fullname) {
        return $this->builder->where('fullname', 'like', '%' . $fullname . '%');
    }
}