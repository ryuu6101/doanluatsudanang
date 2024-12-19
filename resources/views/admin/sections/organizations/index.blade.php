@extends('admin.layouts.master')

@section('title', 'Tổ chức')

@section('contents')

@livewire('organizations.list-organization')
@livewire('organizations.crud-organization')

@endsection