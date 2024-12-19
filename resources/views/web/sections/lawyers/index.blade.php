@extends('web.layouts.master')

@section('title', 'Quản lý luật sư')

@section('contents')

<div class="panel panel-primary">
    <div class="panel-heading">
        {{ $organization->name }}
    </div>
    <div class="panel-body">
        <ul style="padding: 0">
            <li>
                <strong>Điện thoại cơ quan:</strong> {{ $organization->phone }}
            </li>
        </ul>
        <p class="text-center">
        </p>

        <hr>
        @if ($lawyers->count() > 0)
        <div class="row">
            @foreach ($lawyers as $lawyer)
            @php($lawyer_url = route('lawyer.detail', ['organization' => $organization, 'lawyer' => $lawyer]))
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail" style="min-height: 218.6px;">
                    <div style="height: 100px">
                        <a href="{{ $lawyer_url }}" title="{{ $lawyer->fullname }}">
                            @if ($lawyer->profile_pic != '')
                            <img class="imgthumbnail" src="{{ url($lawyer->profile_pic) }}" 
                            style="max-height: 100px" alt="{{ $lawyer->fullname }}">
                            @else
                            <img class="imgthumbnail" src="{{ asset('doanluatsudanang/themes/default/images/no-avatar.jpg') }}" 
                            style="max-height: 100px" alt="{{ $lawyer->fullname }}">
                            @endif
                        </a>
                    </div>
                    <div class="caption text-center">
                        <h3><a href="{{ $lawyer_url }}" title="{{ $lawyer->fullname }}">{{ $lawyer->fullname }}</a></h3>
                        <p>
                            {{ $lawyer->card_number }}<br>
                            {{ $lawyer->birthday->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</div>

@endsection