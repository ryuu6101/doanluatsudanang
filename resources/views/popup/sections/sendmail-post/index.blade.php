@extends('popup.layouts.master')

@section('title', $post->title)

@push('meta')
<meta name="description" content="{{ $post->title }} - Sendmail - {{ $post->category->name }}">
<meta property="og:title" content="{{ $post->title }}">
<meta property="og:description" content="{{ $post->title }} - Sendmail - {{ $post->category->name }}">
@endpush

@push('styles')
<style type="text/css">
    body {
        padding: 20px;
        font-size: 11pt;
    }
</style>
@endpush

@section('contents')

<div id="sendmail">
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-center">Gửi bài viết qua email</h1>
            <form id="sendmailForm" action="#!" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="sname" class="col-sm-4 control-label">Tên của bạn<em>*</em></label>
                    <div class="col-sm-20">
                        <input id="sname" type="text" name="name" value="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="syourmail_iavim" class="col-sm-4 control-label">E-mail của bạn</label>
                    <div class="col-sm-20">
                        <input id="syourmail_iavim" type="email" name="youremail" value="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="semail" class="col-sm-4 control-label">E-mail người nhận<em>*</em></label>
                    <div class="col-sm-20">
                        <input id="semail" type="text" name="email" value="" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="scontent" class="col-sm-4 control-label">Nội dung</label>
                    <div class="col-sm-20">
                        <textarea id="scontent" name="content" rows="5" cols="20" class="form-control"></textarea>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label for="semail" class="col-sm-4 control-label">Mã bảo mật<em>*</em></label>
                    <div class="col-sm-20">
                        <input name="nv_seccode" type="text" id="seccode" class="form-control" maxlength="6" 
                        style="width: 100px; float: left !important; margin: 2px 5px 0 !important;">
                        <img class="captchaImg pull-left" style="margin-top: 5px;" alt="Mã bảo mật" 
                        src="/index.php?scaptcha=captcha&amp;t=1736870938" width="150" height="40">
                        <img alt="Thay mới" src="{{ asset('doanluatsudanang/assets/images/refresh.png') }}" 
                        width="16" height="16" class="refresh pull-left resfresh1" style="margin: 9px;" 
                        onclick="change_captcha('#seccode');">
                    </div>
                </div> --}}
                <input type="submit" value="Gửi" class="btn btn-default">
            </form>
        </div>
    </div>
</div>

@endsection