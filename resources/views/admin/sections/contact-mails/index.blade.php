@extends('admin.layouts.master')

@section('title', 'Phản hồi')

@section('contents')

@livewire('contact-mails.list-contact-mail')
@livewire('contact-mails.contact-detail')

@endsection