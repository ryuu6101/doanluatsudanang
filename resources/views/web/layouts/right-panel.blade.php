@inject('postRepos', 'App\Repositories\Posts\PostRepositoryInterface')

<div class="col-sm-6 col-md-6 col-sm-push-6 col-md-push-5">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Tin xem nhiều
        </div>
        <div class="panel-body">
            <ul class="block_tophits list-none list-items">
                @php($right_panel_posts = $postRepos->getAll()->take(10)->sortByDesc('view_count'))
                @if($right_panel_posts->count() > 0)
                @foreach ($right_panel_posts as $right_panel_post)
                @php($post_url = route('post.detail', ['category' => $right_panel_post->category, 'post' => $right_panel_post]))
                <li class="clearfix">
                    <a title="{{ $right_panel_post->title }}" href="{{ $post_url }}">
                        @if ($right_panel_post->thumbnail)
                        <img src="{{ url($right_panel_post->thumbnail) }}" 
                        alt="{{ $right_panel_post->title }}" width="70" class="img-thumbnail pull-left mr-1">
                        @else
                        <img src="{{ asset('images/placeholders/placeholder.png') }}" 
                        alt="" width="70" class="img-thumbnail pull-left mr-1">
                        @endif
                    </a>
                    <a class="show" href="{{ $post_url }}" data-content="" data-img="" data-rel="block_news_tooltip">
                        {{ $right_panel_post->title }}
                    </a>
                </li>
                @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>