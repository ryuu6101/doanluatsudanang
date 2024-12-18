<?php

namespace App\Repositories\Posts;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel() {
        return Post::class;
    }
}