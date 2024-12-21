<?php

namespace App\Repositories\Posts;

use App\Repositories\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function getPublicPosts();
    public function getNewerPosts($post);
    public function getOlderPosts($post);
}