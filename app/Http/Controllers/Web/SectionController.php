<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Lawyers\LawyerRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\Organizations\OrganizationRepositoryInterface;

class SectionController extends Controller
{
    protected $categoryRepos;
    protected $postRepos;
    protected $organizationRepos;
    protected $lawyerRepos;

    public function __construct(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
        OrganizationRepositoryInterface $organizationRepos,
        LawyerRepositoryInterface $lawyerRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
        $this->postRepos = $postRepos;
        $this->organizationRepos = $organizationRepos;
        $this->lawyerRepos = $lawyerRepos;
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

    public function organs() {
        $menu = ['navbar' => 'quan-ly-luat-su'];

        $organizations = $this->organizationRepos->getAll();

        return view('web.sections.organs.index')->with([
            'menu' => $menu,
            'organizations' => $organizations,
        ]);
    }
}
