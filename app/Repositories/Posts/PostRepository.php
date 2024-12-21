<?php

namespace App\Repositories\Posts;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel() {
        return Post::class;
    }

    public function getPublicPosts() {
        return $this->model->whereNotNull('published_at')->where('public', 1)->get();
    }

    public function getNewerPosts($post) {
        return $this->model->whereNotNull('published_at')->where('public', 1)->where('id', '<>', $post->id)
                        ->where('published_at', '>=', $post->published_at)->get();
    }

    public function getOlderPosts($post) {
        return $this->model->whereNotNull('published_at')->where('public', 1)->where('id', '<>', $post->id)
                        ->where('published_at', '<=', $post->published_at)->get();
    }
}