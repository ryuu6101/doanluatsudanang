@extends('web.layouts.master')

@section('title', $post->title)

@section('contents')

<div class="news_column panel panel-default" itemtype="http://schema.org/NewsArticle" itemscope="">
    <div class="panel-body">
        <h1 class="title margin-bottom-lg" itemprop="headline">{{ $post->title }}</h1>
        <div class="row margin-bottom-lg">
            <div class="col-md-12">
                <span class="h5">{{ $post->published_at->format('l - d/m/Y H:i') }}</span>
            </div>
            <div class="col-md-12">
                <ul class="list-inline text-right">
                    <li>
                        <a class="dimgray" rel="nofollow" title="Gửi bài viết qua email" href="#!">
                            <em class="fa fa-envelope fa-lg">&nbsp;</em>
                        </a>
                    </li>
                    <li>
                        <a class="dimgray" rel="nofollow" title="In ra" href="#!">
                            <em class="fa fa-print fa-lg">&nbsp;</em>
                        </a>
                    </li>
                    <li>
                        <a class="dimgray" rel="nofollow" title="Lưu bài viết này" href="#!">
                            <em class="fa fa-save fa-lg">&nbsp;</em>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
            <div class="clearfix">
            <div class="hometext m-bottom" itemprop="description">{{ $post->description }}</div>
                <figure class="article center">
                    @if ($post->thumbnail)
                    <img alt="{{ $post->title }}" src="{{ url($post->thumbnail) }}" width="460" class="img-thumbnail">
                    @else
                    <img alt="" src="{{ asset('images/placeholders/placeholder.png') }}" width="460" class="img-thumbnail">
                    @endif
                <figcaption>{{ $post->title }}</figcaption>
            </figure>
        </div>
        <div id="news-bodyhtml" class="bodytext margin-bottom-lg">{!! $post->contents !!}</div>
    </div>
</div>

@endsection