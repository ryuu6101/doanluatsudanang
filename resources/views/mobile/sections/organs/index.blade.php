@extends('mobile.layouts.master')

@section('title', 'Quản lý luật sư')

@push('meta')
<meta name="description" content="Quản Lý Luật Sư - Quản Lý Luật Sư">
<meta property="og:type" content="website">
<meta property="og:description" content="Quản Lý Luật Sư - Quản Lý Luật Sư">
@endpush

@section('contents')

@if ($organizations->count() > 0)
@foreach ($organizations as $organization)
<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <caption>
            <a class="org" href="{{ route('organ.lawyers.get', ['organization' => $organization]) }}">{{ $organization->name }}</a>
            <br><strong>Email:</strong>{{ $organization->email }}
            <br><strong>Điện thoại:</strong>{{ $organization->phone }}
        </caption>
        @if ($organization->lawyers->count() > 0)
        <thead>
            <tr>
                <th class="text-center">STT</th>
                <th class="text-center">Họ tên</th>
                <th class="text-center">Ngày sinh</th>
                <th class="text-center">Số thẻ luật sư</th>
                <th class="text-center">Tổ chức hành nghề</th>
                <th class="text-center">Ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organization->lawyers as $lawyer)
            @php($lawyer_url = route('lawyer.detail', ['organization' => $organization, 'lawyer' => $lawyer]))
            <tr>
                <td class="text-center" style="text-align: center; vertical-align: middle">{{ $loop->iteration }}</td>
                <td style="vertical-align: middle">
                    <a href="{{ $lawyer_url }}" class="name_org"><strong style="font-size:12px;">{{ $lawyer->fullname }}</strong></a><br>
                </td>
                <td style="vertical-align: middle">
                    <strong>{{ $lawyer->birthday->format('d/m/Y') }}</strong><br>
                </td>
                <td class="text-center position" style="text-align: center; vertical-align: middle">
                    <strong>{{ $lawyer->card_number }}</strong>
                </td>
                <td class="text-center" style="text-align: center; vertical-align: middle">
                    <strong><br>{{ $lawyer->workplace }}</strong>
                </td>
                <td style="text-align: center; vertical-align: middle">
                    <a href="{{ $lawyer_url }}" title="{{ $lawyer->fullname }}">
                        @if ($lawyer->profile_pic)
                        <img src="{{ asset($lawyer->profile_pic) }}" class="img-thumbnail" 
                        style="max-width: 80px" alt="{{ $lawyer->fullname }}">
                        @else
                        <img src="{{ asset('doanluatsudanang/themes/default/images/no-avatar.jpg') }}" class="img-thumbnail" 
                        style="max-width: 80px" alt="{{ $lawyer->fullname }}">
                        @endif
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>
@endforeach
@endif

@endsection