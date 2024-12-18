@extends('admin.layouts.master')

@section('title', 'Danh mục')

@section('contents')

@livewire('categories.list-category')
@livewire('categories.crud-category')

@endsection