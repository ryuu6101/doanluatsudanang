<?php

namespace App\Http\Controllers\Web;

use App\Models\Post;
use App\Models\Lawyer;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Support\Str;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Repositories\Posts\PostRepositoryInterface;
use App\Repositories\Lawyers\LawyerRepositoryInterface;
use App\Repositories\Categories\CategoryRepositoryInterface;
use App\Repositories\ContactMails\ContactMailRepositoryInterface;
use App\Repositories\Organizations\OrganizationRepositoryInterface;

class SectionController extends Controller
{
    protected $categoryRepos;
    protected $postRepos;
    protected $organizationRepos;
    protected $lawyerRepos;
    protected $contactMailRepos;

    public function __construct(
        CategoryRepositoryInterface $categoryRepos,
        PostRepositoryInterface $postRepos,
        OrganizationRepositoryInterface $organizationRepos,
        LawyerRepositoryInterface $lawyerRepos,
        ContactMailRepositoryInterface $contactMailRepos,
    ) {
        $this->categoryRepos = $categoryRepos;
        $this->postRepos = $postRepos;
        $this->organizationRepos = $organizationRepos;
        $this->lawyerRepos = $lawyerRepos;
        $this->contactMailRepos = $contactMailRepos;
    }

    public function home() {
        $menu = ['navbar' => 'tin-tuc'];

        $categories = $this->categoryRepos->getAll();
        $hot_news = $this->postRepos->getPublicPosts()->sortByDesc('published_at')->take(6);

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

    public function postDetail(Category $category, Post $post, Request $request) {
        // $post->increment('view_count');

        // return view('web.sections.posts.detail')->with([
        //     'post' => $post,
        // ]);

        if (! Auth::check()) { //guest user identified by ip
            $cookie_name = (Str::replace('.','',($request->ip())).'-'. $post->id);
        } else {
            $cookie_name = (Auth::user()->id.'-'. $post->id); //logged in user
        }

        $newer_posts = $this->postRepos->getNewerPosts($post)->sortByDesc('published_at')->take(-10);
        $older_posts = $this->postRepos->getOlderPosts($post)->sortByDesc('published_at')->take(10);

        if (Cookie::get($cookie_name) == '') { //check if cookie is set
            $cookie = cookie($cookie_name, '1', 60); //set the cookie
            $post->increment('view_count'); //count the view
            return response()->view('web.sections.posts.detail',[
                'post' => $post,
                'newer_posts' => $newer_posts,
                'older_posts' => $older_posts,
            ])->withCookie($cookie); //store the cookie
        } else {
            return  view('web.sections.posts.detail')->with([
                'post' => $post,
                'newer_posts' => $newer_posts,
                'older_posts' => $older_posts,
            ]); //this view is not counted
        }
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

    public function sendContactMail(Request $request) {
        $params = $request->input();
        unset($params['_method']);
        unset($params['_token']);
        
        $this->contactMailRepos->create($params);
    }

    public function documents() {
        $menu = ['navbar' => 'thong-bao-thong-tin'];

        return view('web.sections.documents.index')->with(['menu' => $menu]);
    }

    public function documentDetail(Document $document) {
        return view('web.sections.documents.detail')->with(['document' => $document]);
    }

    public function search(Request $request) {
        $keyword = $request->input('q');

        $results = $this->postRepos->filter(['keyword' => $keyword])->map(function ($post) use ($keyword) {
            $post->title = preg_replace('/(' . $keyword . ')/i', "<span class='keyword'>$1</span>", $post->title);

            $description = $post->description;
            if (strpos($description, $keyword) !== false) {
                $post->hightlighted = preg_replace('/(' . $keyword . ')/i', "<span class='keyword'>$1</span>", $description);
                return $post;
            }

            $max_len = 400;
            // $contents = strip_tags($post->contents);
            $contents = strip_tags(html_entity_decode($post->contents, ENT_QUOTES, 'UTF-8'), "\xc2\xa0");
            $test = $contents;
            if (($pos = mb_strpos($contents, $keyword)) !== false) {
                $start = $pos-140 > 0 ? $pos-140 : 0;
                $contents = ($start>0?'...':'').mb_substr($contents,$start,$max_len).($start+$max_len<strlen($contents)?'...':'');
                $post->hightlighted = preg_replace('/(' . $keyword . ')/i', "<span class='keyword'>$1</span>", $contents);
                return $post;
            }

            if ($description != '') {
                $post->hightlighted = $description;
            } else {
                $post->hightlighted = strlen($contents) > $max_len ? mb_substr($contents,0,$max_len)."..." : $contents;
            }
            return $post;
        })->sortByDesc('published_at')->paginate(10);
        // dd($results);

        return view('web.sections.search.index')->with([
            'keyword' => $keyword,
            'results' => $results,
        ]);
    }

    public function printPost(Category $category, Post $post) {
        return  view('popup.sections.print-post.index')->with(['post' => $post]);
    }

    public function sendMailPost(Category $category, Post $post) {
        return  view('popup.sections.sendmail-post.index')->with(['post' => $post]);
    }
}
