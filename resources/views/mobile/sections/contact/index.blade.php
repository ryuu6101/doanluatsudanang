@extends('mobile.layouts.master')

@section('title', 'Liên hệ')

@push('meta')
<meta name="description" content="Liên hệ - Liên hệ - {{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:description" content="Liên hệ - Liên hệ - {{ url()->current() }}">
@endpush

@section('contents')

<div class="row">
    <div class="col-sm-12 col-md-14">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Đoàn luật sư Đà Nẵng</h3>
            </div>
            <div class="panel-body">
                <div class="margin-bottom">
                    @php($site_info = $site_info ?? \Illuminate\Support\Facades\DB::table('site_configs')->first())
                    {{ $site_info->company_name }}<br>
                    <em><strong>Địa chỉ:</strong></em> {{ $site_info->address }}<br>
                    <em><strong>Điện thoại/Fax:</strong></em> {{ $site_info->phone }}<br>
                    <em><strong>Email văn phòng đoàn:</strong></em> {{ $site_info->email }}<br>
                    &nbsp;
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-10">
        <div class="panel panel-primary">
            <div class="panel-heading">Gửi phản hồi</div>
            <div class="panel-body loadContactForm">
                <div>
                    <form method="post" action="{{ route('contact.send') }}" onsubmit="return nv_validForm(this);" novalidate="">
                        @method('POST')
                        @csrf
                        <div class="nv-info margin-bottom-lg" data-mess="Vui lòng điền vào mẫu dưới đây và chúng tôi sẽ liên lạc với bạn.">
                            Vui lòng điền vào mẫu dưới đây và chúng tôi sẽ liên lạc với bạn.
                        </div>
                        {{-- <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <em class="fa fa-folder-open fa-lg fa-horizon"></em>
                                </span>
                                <select class="form-control" name="fcat">
                                    <option value="0">
                                        Chủ đề bạn quan tâm
                                    </option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <em class="fa fa-file-text fa-lg fa-horizon"></em>
                                </span>
                                <input type="text" maxlength="255" class="form-control required" value="" name="ftitle" 
                                placeholder="Tiêu đề" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" 
                                data-mess="Vui lòng nhập tiêu đề">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <em class="fa fa-user fa-lg fa-horizon"></em>
                                </span>
                                <input type="text" maxlength="100" value="" name="fname" class="form-control required" 
                                placeholder="Họ và tên" data-pattern="/^(.){3,}$/" onkeypress="nv_validErrorHidden(this);" 
                                data-mess="Vui lòng nhập họ và tên">
                                {{-- <span class="input-group-addon pointer" title="Đăng nhập" onclick="return loginForm();">
                                    <em class="fa fa-sign-in fa-lg"></em>
                                </span> --}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <em class="fa fa-envelope fa-lg fa-horizon"></em>
                                </span>
                                <input type="email" maxlength="60" value="" name="femail" class="form-control required" 
                                placeholder="Email" onkeypress="nv_validErrorHidden(this);" data-mess="Vui lòng nhập email khả dụng">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <em class="fa fa-phone fa-lg fa-horizon"></em>
                                </span>
                                <input type="text" maxlength="60" value="" name="fphone" class="form-control" placeholder="Điện thoại">
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <textarea cols="8" name="fcon" class="form-control required" maxlength="1000" placeholder="Nội dung" 
                                onkeypress="nv_validErrorHidden(this);" data-mess="Vui lòng nhập nội dung"></textarea>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <div class="middle text-right clearfix">
                                <img width="150" height="40" title="Mã bảo mật" alt="Mã bảo mật" 
                                src="/index.php?scaptcha=captcha&amp;t=1735803301" class="captchaImg display-inline-block">
                                <em onclick="change_captcha('.fcode');" title="Thay mới" 
                                class="fa fa-pointer fa-refresh margin-left margin-right"></em>
                                <input type="text" placeholder="Mã bảo mật" maxlength="6" value="" name="fcode" 
                                class="fcode required form-control display-inline-block" style="width:100px;" data-pattern="/^(.){6,6}$/" 
                                onkeypress="nv_validErrorHidden(this);" data-mess="Vui lòng nhập đúng mã bảo mật mà bạn thấy trong hình">
                            </div>
                        </div> --}}
                        <div class="text-center form-group">
                            <input type="button" value="Nhập lại" class="btn btn-default" onclick="nv_validReset(this.form);return!1;">
                            <input type="submit" value="Gửi đi" name="btsend" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection