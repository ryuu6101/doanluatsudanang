<?php

namespace App\Filters;

class UserFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'username',
        'role_id',
    ];
    
    public function filterFullname($fullname) {
        return $this->builder->where('fullname', 'like', '%' . $fullname . '%');
    }
}

