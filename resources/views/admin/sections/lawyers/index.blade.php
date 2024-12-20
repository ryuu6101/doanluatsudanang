@extends('admin.layouts.master')

@section('title', 'Quản lý luật sư')

@section('contents')

@livewire('lawyers.list-lawyer')
@livewire('lawyers.delete-lawyer')

@endsection