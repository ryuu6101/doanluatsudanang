<?php

namespace App\Filters;

use Carbon\Carbon;

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

    public function filterPublishedDateStart($date) {
        $date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        return $this->builder->whereDate('published_at', '>=', $date);
    }

    public function filterPublishedDateEnd($date) {
        $date = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
        return $this->builder->whereDate('published_at', '<=', $date);
    }
}