<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;

class SectionController extends Controller
{
    protected $categoryRepos;
    protected $postRepos;

    public function __construct(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
        $this->postRepos = $postRepos;
    }

    public function home() {
        $menu = ['navbar' => 'tin-tuc'];

        $categories = $this->categoryRepos->getAll();
        $hot_news = $this->postRepos->getAll()->take(6)->sortByDesc('published_at');

        return view('web.sections.home.index')->with([
            'menu' => $menu,
            'categories' => $categories,
            'hot_news' => $hot_news,
        ]);
    }

    public function about() {
        $menu = ['navbar' => 'dashboard'];

        return view('web.sections.about.index')->with(['menu' => $menu]);
    }

    public function getCategoryPosts(Category $category) {
        $posts = $category->posts->sortByDesc('published_at');
        return view('web.sections.posts.index')->with([
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function postDetail(Category $category, Post $post) {
        return view('web.sections.posts.detail')->with([
            'post' => $post,
        ]);
    }
}