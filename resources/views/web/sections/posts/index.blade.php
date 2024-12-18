@extends('web.layouts.master')

@section('title', $category->name)

@section('contents')

<div class="news_column">
    @if ($posts->count() > 0)
    @foreach ($posts as $post)
    @php($post_url = route('post.detail', ['category' => $category, 'post' => $post]))
    <div class="panel panel-default">
        <div class="panel-body featured">
            <a href="{{ $post_url }}" title="{{ $post->title }}">
                @if ($post->thumbnail)
                <img alt="{{ $post->title }}" src="{{ url($post->thumbnail) }}" width="100" class="img-thumbnail pull-left imghome">
                @else
                <img alt="" src="{{ asset('images/placeholders/placeholder.png') }}" width="100" class="img-thumbnail pull-left imghome">
                @endif
            </a>
            <h2>
                <a href="{{ $post_url }}" title="{{ $post->title }}">{{ $post->title }}</a>
            </h2>
            <div class="text-muted">
                <ul class="list-unstyled list-inline">
                    <li>
                        <em class="fa fa-clock-o">&nbsp;</em> {{ $post->published_at->format('d/m/Y H:i:s A') }}
                    </li>
                    <li>
                        <em class="fa fa-eye">&nbsp;</em> Đã xem: 769
                    </li>
                    <li>
                        <em class="fa fa-comment-o">&nbsp;</em> Phản hồi: 0
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endforeach
    @endif
</div>

@endsection