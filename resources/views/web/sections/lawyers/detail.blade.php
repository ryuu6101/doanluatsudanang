@extends('web.layouts.master')

@section('title', $lawyer->fullname)

@section('contents')

<div class="panel panel-primary">
    <div class="panel-heading">
        Thông tin nhân sự
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" style="font-size: 14px">
                <colgroup>
                    <col width="200">
                </colgroup>
                <tbody>
                    <tr>
                        <td rowspan="3" class="text-center">
                            @if ($lawyer->profile_pic)
                            <img src="{{ url($lawyer->profile_pic) }}" class="img-thumbnail" style="max-width: 80px">
                            @else
                            <img src="{{ asset('doanluatsudanang/themes/default/images/no-avatar.jpg') }}" 
                            class="img-thumbnail" style="max-width: 80px">
                            @endif
                        </td>
                        <td>Họ tên</td>
                        <td>{{ $lawyer->fullname }}</td>
                    </tr>
                    <tr>
                        <td>Số thẻ luật sư</td>
                        <td>{{ $lawyer->card_number }}</td>
                    </tr>
                    <tr>
                        <td>Tổ chức hành nghề</td>
                        <td>{{ $lawyer->workplace }}</td>
                    </tr>
                    <tr>
                        <td>Thuộc bộ phận</td>
                        <td colspan="2">
                            <a href="{{ route('organ.lawyers.get', ['organization' => $lawyer->organization]) }}" 
                            title="{{ $lawyer->organization->name }}">
                                {{ $lawyer->organization->name }}
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Ngày sinh</td>
                        <td colspan="2"> {{ $lawyer->birthday->format('d/m/Y') }} </td>
                    </tr>
                    <tr>
                        <td>Ngày cấp thẻ</td>
                        <td colspan="2">{{ $lawyer->card_issuance_date->format('d/m/Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-center">
        </div>
        <br>
    </div>
</div>

@endsection