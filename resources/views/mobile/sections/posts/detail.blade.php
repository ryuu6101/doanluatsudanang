@extends('mobile.layouts.master')

@section('title', $post->title)

@push('meta')
<meta name="description" content="{{ $post->title }} - Detail - Tin Tức - {{ url()->current() }}">
<meta property="og:type" content="article">
<meta property="og:description" content="{{ $post->title }} - Detail - Tin Tức - {{ url()->current() }}">
<meta property="og:image" content="{{ url($post->thumbnail) }}">
<meta property="article:published_time" content="{{ $post->published_at->format('Y-m-d+7H:i:s') }}">
<meta property="article:modified_time" content="{{ $post->updated_at->format('Y-m-d+7H:i:s') }}">
<meta property="article:section" content="{{ $post->category->name }}">
@endpush

@push('styles')
<style>
    .bodytext img {
        width: 100%;
        height: auto;
    }
</style>
@endpush

@section('contents')

<div class="news_column panel panel-default" itemtype="http://schema.org/NewsArticle" itemscope="">
    <div class="panel-body">
        <h1 itemprop="headline">{{ $post->title }}</h1>
        <div class="hidden hide d-none" itemprop="author" itemtype="http://schema.org/Person" itemscope="">
            <span itemprop="name"></span>
        </div>
        <em class="time">{{ ucfirst($post->published_at->locale('vi')->translatedFormat('l, d/m/Y, H:i')) }}</em>
        <hr>
        <div id="hometext">
            <div class="h2" itemprop="description">{{ $post->description }}</div>
        </div>
        <div style="max-width:224px;margin: 10px auto 10px auto">
            @if ($post->thumbnail)
            <img alt="{{ $post->title }}" src="{{ url($post->thumbnail) }}" class="img-thumbnail" width="460">
            @else
            <img alt="" src="{{ asset('images/placeholders/placeholder.png') }}" class="img-thumbnail" width="460">
            @endif
            <p class="imgalt"><em>{{ $post->thumbnail_description }}</em></p>
        </div>
        <div class="bodytext">{!! $post->contents !!}</div>

        @if ($post->attachments->count() > 0)
        <h3 class="newh3"><i class="fa fa-download"></i> <strong>File đính kèm</strong></h3>
        <div class="list-group news-download-file">
            @foreach ($post->attachments->sortBy('index') as $attachment)
            <div class="list-group-item">
                <span class="badge">
                    <a role="button" data-toggle="collapse" href="#pdf_{{ $attachment->id }}" aria-expanded="false" class="collapsed">
                        <i class="fa fa-file-pdf-o" data-rel="tooltip" data-content="Xem trước"></i>
                    </a>
                </span>
                <a href="{{ asset($attachment->file) }}" title="{{ $attachment->name }}">
                    Tập tin {{ $loop->iteration }}: 
                    <strong>{{ $attachment->name }}</strong>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="pdf_{{ $attachment->id }}" data-src="{{ asset($attachment->file) }}" data-toggle="collapsepdf" 
                    aria-expanded="false" style="height: 0px;">
                    <div style="height:10px"></div>
                    <div class="well">
                        <iframe frameborder="0" height="600" scrolling="yes" src="" width="100%"></iframe>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        <hr>
        <div class="clear">&nbsp;</div>

        @if ($newer_posts->count() > 0)
        <p><strong>Những tin mới hơn</strong></p>
        <ul class="related">
            @foreach ($newer_posts as $newer_post)
            <li>
                <em class="fa fa-angle-right">&nbsp;</em>
                <a href="{{ route('post.detail', ['category' => $newer_post->category, 'post' => $newer_post]) }}" title="">
                    {{ $newer_post->title }}
                </a>
                <em>({{ $newer_post->published_at->format('d/m/Y') }})</em>
            </li>
            @endforeach
        </ul>
        <div class="clear">&nbsp;</div>
        @endif

        @if ($older_posts->count() > 0)
        <p><strong>Những tin cũ hơn</strong></p>
        <ul class="related">
            @foreach ($older_posts as $older_post)
            <li>
                <em class="fa fa-angle-right">&nbsp;</em>
                <a class="list-inline" href="{{ route('post.detail', ['category' => $older_post->category, 'post' => $older_post]) }}" title="">
                    {{ $older_post->title }}
                </a>
                <em>({{ $older_post->published_at->format('d/m/Y') }})</em>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>

@endsection