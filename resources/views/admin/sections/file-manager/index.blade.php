@extends('admin.layouts.master')

@section('title', 'Quản lý file')

@section('contents')

<div class="row">
    <div class="col">
        <iframe src="{{ url('responsive_filemanager/filemanager/dialog.php') }}?type=2&lang=vi" frameborder="0" 
        class="w-100 border shadow" height="530"></iframe>
    </div>
</div>

@endsection