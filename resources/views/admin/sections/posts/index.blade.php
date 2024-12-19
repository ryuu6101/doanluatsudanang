@extends('admin.layouts.master')

@section('title', 'Quản lý bài viết')

@section('contents')

@livewire('posts.list-post')
@livewire('posts.delete-post')

@endsection