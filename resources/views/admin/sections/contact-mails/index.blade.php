@extends('admin.layouts.master')

@section('title', 'Liên hệ')

@section('contents')

@livewire('contact-mails.list-contact-mail')
@livewire('contact-mails.contact-detail')

@endsection