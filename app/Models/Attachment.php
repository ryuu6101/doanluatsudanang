<?php

namespace App\Models;

use App\Models\Post;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attachment extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'name',
        'file',
        'index',
        'post_id',
    ];

    public function post() {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
