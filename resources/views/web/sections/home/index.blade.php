@extends('web.layouts.master')

@section('title', 'doanluatsudanang')

@php($current_time = now()->locale('vi')->translatedFormat('l, d/m/Y, H:i'))
@section('current_time', ucfirst($current_time))

@section('contents')

@if ($hot_news->count() > 0)
<div id="hot-news">
    <div class="panel panel-default news_column">
        <div class="panel-body">
            <div class="row">
                @php ($first_news = $hot_news->shift())
                @php($post_url = route('post.detail', ['category' => $first_news->category, 'post' => $first_news]))
                <div class="col-md-14 margin-bottom-lg">
                    <div class="margin-bottom text-center">
                        <a href="{{ $post_url }}" title="">
                            @if($first_news->thumbnail)
                            <img src="{{ url($first_news->thumbnail) }}" alt="{{ $first_news->title }}" width="500" class="img-thumbnail">
                            @else
                            <img src="{{ asset('images/placeholders/placeholder.png') }}" alt="" width="500" class="img-thumbnail">
                            @endif
                        </a>
                    </div>
                    <h2 class="margin-bottom-sm">
                        <a href="{{ $post_url }}" title="{{ $first_news->title }}">
                            {{ $first_news->title }}
                        </a>
                    </h2>
                    <p class="text-right"><a href="{{ $post_url }}"><em class="fa fa-sign-out"></em>Xem tiếp...</a></p>
                </div>
                @if ($hot_news->count() > 0)
                <div class="hot-news-others col-md-10 margin-bottom-lg">
                    <ul class="column-margin-left list-none">
                        @foreach ($hot_news as $post)
                        @php($post_url = route('post.detail', ['category' => $post->category, 'post' => $post]))
                        <li class="icon_list">
                            <a class="show black h4 clearfix" href="{{ $post_url }}" data-placement="bottom" data-content="" 
                            data-img="" data-rel="tooltip" title="{{ $post->title }}">
                                @if ($post->thumbnail)
                                <img src="{{ url($post->thumbnail) }}" alt="{{ $post->title }}" 
                                class="img-thumbnail pull-right margin-left-sm" style="width:65px;">
                                @else
                                <img src="{{ asset('images/placeholders/placeholder.png') }}" alt=""
                                class="img-thumbnail pull-right margin-left-sm" style="width:65px;">
                                @endif
                                <span>{{ $post->title }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@foreach ($categories as $category)
@php ($posts = $category->posts->sortByDesc('published_at'))
@continue($posts->count() <= 0)
<div class="news_column">
    <div class="panel panel-default clearfix">
        <div class="panel-heading">
            <ul class="list-inline sub-list-icon" style="margin: 0">
                <li>
                    <h4>
                        <a title="{{ $category->name }}" href="{{ route('category.posts.get', ['category' => $category]) }}">
                            <span class="text-white">{{ $category->name }}</span>
                        </a>
                    </h4>
                </li>
            </ul>
        </div>
        <div class="panel-body">
            <div class="row">
                @php($first_post = $posts->shift())
                @php($post_url = route('post.detail', ['category' => $category, 'post' => $first_post]))
                <div class="{{ $posts->count() > 0 ? 'col-md-16' : 'col-md-24' }}">
                    <a title="{{ $first_post->title }}" href="{{ $post_url }}">
                        @if ($first_post->thumbnail)
                        <img src="{{ $first_post->thumbnail }}" alt="{{ $first_post->title }}" width="100" 
                        class="img-thumbnail pull-left imghome"></a>
                        @else
                        <img src="{{ asset('images/placeholders/placeholder.png') }}" alt="" width="100" 
                        class="img-thumbnail pull-left imghome"></a>
                        @endif
                    <h3>
                        <a title="{{ $first_post->title }}" href="{{ $post_url }}">{{ $first_post->title }}</a>
                    </h3>
                    <div class="text-muted">
                        <ul class="list-unstyled list-inline">
                            <li><em class="fa fa-clock-o">&nbsp;</em>{{ $first_post->published_at->format('d/m/Y H:i') }}</li>
                            <li><em class="fa fa-eye">&nbsp;</em> {{ $first_post->view_count }}</li>
                            <li><em class="fa fa-comment-o">&nbsp;</em> 0</li>
                        </ul>
                    </div>
                    <span>{{ $first_post->description }}</span>
                </div>

                @if ($posts->count() > 0)
                <div class="col-md-8">
                    <ul class="related list-items">
                        @foreach ($posts as $post)
                        <li class="icon_list">
                            <a class="show h4" href="{{ route('post.detail', ['category' => $category, 'post' => $post]) }}" 
                            title="{{ $post->title }}" data-content="" data-img="" data-rel="tooltip" data-placement="bottom">
                                {{ $post->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection