@extends('web.layouts.master')

@section('title', $document->name)

@push('meta')
<meta name="description" content="{{ $document->name }} - Viewcat - Văn Bản Pháp Luật - {{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:description" content="{{ $document->name }} - Viewcat - Văn Bản Pháp Luật - {{ url()->current() }}">
@endpush

@section('contents')



@endsection