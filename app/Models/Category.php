<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function getRouteKeyName() {
        return 'slug';
    }

    public function all_posts() {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function posts() {
        return $this->all_posts()->whereNotNull('published_at')->where('public', 1);
    }
}
