@extends('admin.layouts.master')

@section('title', 'Liên hệ')

@section('contents')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.response.send') }}" method="POST">
                    @method('POST')
                    @csrf
                    <div class="row">
                        <div class="col-12 mb-2">
                            <input type="text" name="title" class="form-control" 
                            placeholder="Tiêu đề" value="{{ $contact_mail->title ?? '' }}">
                        </div>
                        <div class="col-12 mb-2">
                            <input type="text" name="email" class="form-control" 
                            placeholder="Gửi tới email" value="{{ $contact_mail->email ?? '' }}">
                        </div>
                        <div class="col-12 mb-2">
                            <textarea name="contents" class="form-control" placeholder="Nội dung phản hồi" style="min-height: 5rem"></textarea>
                        </div>
                        <div class="col-12 text-center mb-2">
                            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection