<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Lawyer;
use App\Models\Category;
use App\Models\Document;
use App\Models\Organization;
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
        $posts = $category->posts()->orderBy('published_at', 'desc')->paginate(20);
        return view('web.sections.posts.index')->with([
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function postDetail(Category $category, Post $post) {
        $view_count = $post->view_count + 1;
        $post->update(['view_count' => $view_count]);

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

    public function getOrganLawyers(Organization $organization) {
        $lawyers = $organization->lawyers()->paginate(48);
        return view('web.sections.lawyers.index')->with([
            'organization' => $organization,
            'lawyers' => $lawyers,
        ]);
    }

    public function lawyerDetail(Organization $organization, Lawyer $lawyer) {
        return view('web.sections.lawyers.detail')->with([
            'lawyer' => $lawyer,
        ]);
    }

    public function contact() {
        $menu = ['navbar' => 'lien-he'];

        return view('web.sections.contact.index')->with(['menu' => $menu]);
    }

    public function documents() {
        $menu = ['navbar' => 'thong-bao-thong-tin'];

        return view('web.sections.documents.index')->with(['menu' => $menu]);
    }

    public function documentDetail(Document $document) {
        return view('web.sections.documents.detail')->with(['document' => $document]);
    }
}
