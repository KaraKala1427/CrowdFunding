@extends('layouts.general')

@section('content')
    @include('pages.main.home')
    @include('pages.main.categories')
{{--    @include('pages.main.services')--}}
    @include('pages.main.faq')
    @include('pages.main.about')
@endsection
