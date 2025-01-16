@extends('web.layouts.master')

@section('title', 'Giới thiệu')

@push('meta')
<meta name="description" content="Giới thiệu - Giới thiệu - {{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:description" content="Giới thiệu - Giới thiệu - {{ url()->current() }}">
<meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('contents')

<div class="page">
	<div class="text-center"></div>
</div>

@endsection