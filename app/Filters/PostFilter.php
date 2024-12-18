<?php

namespace App\Filters;

class PostFilter extends QueryFilter
{
    protected $filterable = [
        'id',
        'slug',
        'description',
        'contents',
        'view_count',
        'category_id',
    ];
    
    public function filterTitle($title) {
        return $this->builder->where('title', 'like', '%' . $title . '%');
    }
}