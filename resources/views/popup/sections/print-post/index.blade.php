@extends('popup.layouts.master')

@section('title', $post->title)

@push('meta')
<meta name="description" content="{{ $post->title }} - Print - {{ $post->category->name }} - {{ url()->current() }}">
<meta property="og:description" content="Print - {{ $post->category->name }} - {{ url()->current() }}">
@endpush

@push('styles')
<style type="text/css">
    body {
        background: #fff;
    }

    #content #bodytext img {
        width: 100%;
        height: auto;
    }
</style>
@endpush

@section('contents')

<div id="print">
    <div id="hd_print">
        <h2 class="pull-left">doanluatsudanang</h2>
        <p class="pull-right"><a title="doanluatsudanang" href="{{ route('home.index') }}">{{ route('home.index') }}</a></p>
    </div>
    <div class="clear"></div>
    <hr>

    <div id="content">
        <h1>{{ $post->title }}</h1>
        <ul class="list-inline">
            <li>{{ ucfirst($post->published_at->locale('vi')->translatedFormat('l, d/m/Y, H:i')) }}</li>
            <li class="hidden-print txtrequired">
                <em class="fa fa-print">&nbsp;</em>
                <a title="In ra" href="javascript:;" onclick="window.print()">In ra</a>
            </li>
            <li class="hidden-print txtrequired">
                <em class="fa fa-power-off">&nbsp;</em>
                <a title="Đóng cửa sổ này" href="javascript:;" onclick="window.close()">Đóng cửa sổ này</a>
            </li>
        </ul>
        <div class="clear"></div>
        <div id="hometext"></div>
        <div class="imghome">
            @if ($post->thumbnail)
            <img alt="{{ $post->title }}" src="{{ url($post->thumbnail) }}" width="460" class="img-thumbnail">
            @else
            <img alt="" src="{{ asset('images/placeholders/placeholder.png') }}" width="460" class="img-thumbnail">
            @endif
        </div>
        <div class="clear"></div>
        <div id="bodytext" class="clearfix">{!! $post->contents !!}</div>
    </div>

    <div id="footer" class="clearfix">
        <div id="url">
            <strong>URL của bản tin này: </strong>
            <a href="{{ url()->current() }}" title="{{ $post->title }}">
                {{ url()->current() }}
            </a>
    
        </div>
        <div class="clear"></div>
        @php($site_info = DB::table('site_configs')->first())
        <div class="copyright">
            © {{ $site_info->site_name }}
        </div>
        <div id="contact">
            <a href="mailto:{{ $site_info->site_email }}">
                {{ $site_info->site_email }}
            </a>
        </div>
    </div>
</div>

@endsection