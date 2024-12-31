<?php

namespace App\Filters;

class ContactMailFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'fullname',
        'email',
        'phone',
        'address',
        'subject',
        'title',
        'contents',
        'read',
    ];
    
    public function filterDetail($detail) {
        return $this->builder->where('fullname', 'like', '%' . $detail . '%')
                            ->orWhere('email', 'like', '%' . $detail . '%')
                            ->orWhere('title', 'like', '%' . $detail . '%');
    }
}