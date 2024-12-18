<?php

namespace App\Filters;

class CategoryFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'slug',
    ];
    
    public function filterName($name) {
        return $this->builder->where('name', 'like', '%' . $name . '%');
    }
}