@extends('web.layouts.master')

@section('title', 'Văn Bản Pháp Luật')

@push('meta')
<meta name="description" content="Văn Bản Pháp Luật - Văn Bản Pháp Luật - {{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:description" content="Văn Bản Pháp Luật - Văn Bản Pháp Luật - {{ url()->current() }}">
<meta property="og:url" content="{{ url()->current() }}">
@endpush

@section('contents')



@endsection