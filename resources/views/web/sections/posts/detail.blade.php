@extends('web.layouts.master')

@section('title', $post->title)

@push('styles')
<style>
    #news-bodyhtml img {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush

@section('contents')

<div class="news_column panel panel-default" itemtype="http://schema.org/NewsArticle" itemscope="">
    <div class="panel-body">
        <h1 class="title margin-bottom-lg" itemprop="headline">{{ $post->title }}</h1>
        <div class="row margin-bottom-lg">
            <div class="col-md-12">
                <span class="h5">{{ ucfirst($post->published_at->locale('vi')->translatedFormat('l, d/m/Y, H:i')) }}</span>
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
                    <img alt="{{ $post->title }}" src="{{ url($post->thumbnail) }}" class="img-thumbnail" style="max-width: 460px">
                    {{-- <figcaption>{{ $post->title }}</figcaption> --}}
                    @else
                    {{-- <img alt="" src="{{ asset('images/placeholders/placeholder.png') }}" class="img-thumbnail" width="460"> --}}
                    @endif
                </figure>
            </div>
            {{-- <div class="clearfix">
                <figure class="article left noncaption pointer" style="width:100px;" onclick="modalShowByObj(this);">
                    <p class="text-center"><img alt="Chi bộ 1 thuộc Đảng bộ Đoàn Luật sư thành phố Đà Nẵng tổ chức Lễ Kết nạp Đảng viên cho Quần chúng ưu tú Trần Thị Ngọc Ánh." src="/uploads/news/2024_08/image-20240813155114-1.jpeg" class="img-thumbnail"></p>
                </figure>
                <div class="hometext m-bottom" itemprop="description"></div>
            </div> --}}
        <div id="news-bodyhtml" class="bodytext margin-bottom-lg">{!! $post->contents !!}</div>

        @if ($post->attachments->count() > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-download fa-fw"></i><strong>File đính kèm</strong>
            </div>
            <div class="list-group news-download-file">
                @foreach ($post->attachments->sortBy('index') as $attachment)
                <div class="list-group-item">
                    <span class="badge">
                        <a role="button" data-toggle="collapse" href="#pdf_{{ $attachment->id }}" aria-expanded="false"
                        style="display:inline-block; padding-top: .45rem">
                            <i class="fa fa-file-pdf-o" data-rel="tooltip" data-content="Xem trước"></i>
                        </a>
                    </span>
                    <a href="{{ asset($attachment->file) }}" title="{{ $attachment->name }}" download="">
                        Tập tin {{ $loop->iteration }}: 
                        <strong>{{ $attachment->name }}</strong>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="pdf_{{ $attachment->id }}" data-src="{{ asset($attachment->file) }}" data-toggle="collapsepdf">
                        <div class="well margin-top">
                            <iframe frameborder="0" height="600" scrolling="yes" src="" width="100%"></iframe>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

@if ($newer_posts->count() > 0 || $older_posts->count() > 0)
<div class="news_column panel panel-default">
    <div class="panel-body other-news">
        @if ($newer_posts->count() > 0)
        <p class="h3"><strong>Những tin mới hơn</strong></p>
        <div class="clearfix">
            <ul class="detail-related related list-none list-items">
                @foreach ($newer_posts as $newer_post)
                <li>
                    <em class="fa fa-angle-right">&nbsp;</em>
                    <h4>
                        <a href="{{ route('post.detail', ['category' => $newer_post->category, 'post' => $newer_post]) }}" 
                        data-placement="bottom" data-content="" data-img="" data-rel="tooltip" title="{{ $newer_post->title }}">
                            {{ $newer_post->title }}
                        </a>
                    </h4>
                    <em>({{ $newer_post->published_at->format('d/m/Y') }})</em>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if ($older_posts->count() > 0)
        <p class="h3"><strong>Những tin cũ hơn</strong></p>
        <div class="clearfix">
            <ul class="detail-related related list-none list-items">
                @foreach ($older_posts as $older_post)
                <li>
                    <em class="fa fa-angle-right">&nbsp;</em>
                    <h4>
                        <a href="{{ route('post.detail', ['category' => $older_post->category, 'post' => $older_post]) }}" 
                        data-placement="bottom" data-content="" data-img="" data-rel="tooltip" title="{{ $older_post->title }}">
                            {{ $older_post->title }}
                        </a>
                    </h4>
                    <em>({{ $older_post->published_at->format('d/m/Y') }})</em>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endif

@endsection