@extends('mobile.layouts.master')

@section('title', $category->name)

@push('meta')
<meta name="description" content="{{ $category->name }} - Viewcat - Tin Tức - {{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:description" content="{{ $category->name }} - Viewcat - Tin Tức - {{ url()->current() }}">
@endpush

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
                        <em class="fa fa-eye">&nbsp;</em> Đã xem: {{ $post->view_count }}
                    </li>
                    <li>
                        <em class="fa fa-comment-o">&nbsp;</em> Phản hồi: 0
                    </li>
                </ul>
            </div>
            <span>{{ $post->description }}</span>
        </div>
    </div>
    @endforeach
    @endif
</div>

<div class="text-center">
    {!! $posts->links('mobile.components.pagination') !!}
</div>

@endsection