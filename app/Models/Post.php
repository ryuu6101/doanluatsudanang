<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, Filterable, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'contents',
        'view_count',
        'category_id',
        'published_at',
        'public',
        'user_id',
    ];

    protected $casts = ['published_at' => 'datetime'];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
