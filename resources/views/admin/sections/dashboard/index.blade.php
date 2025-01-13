@extends('admin.layouts.master')

@section('title', 'Trang chủ')

@section('contents')

<div class="row">
    <div class="col">
        <div class="card">
            {{-- <div class="card-header header-elements-inline bg-secondary text-white">
                <h6 class="card-title">
                    <i class="icon-table2 mr-2"></i>
                </h6>
                <div class="header-elements"></div>
            </div> --}}

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col text-center">
                        <strong>Tổng số bài viết trên trang: {{ $total_post }}</strong>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col text-center">
                        <a href="{{ route('post.create') }}" class="btn btn-primary">
                            Đến mục soạn bài viết
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection