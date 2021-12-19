@extends('layouts.general')

@section('title')
CrowdFunding.kz
@endsection

@section('content')
    @include('pages.main.home')
    @include('pages.main.categories')
{{--    @include('pages.main.services')--}}
    @include('pages.main.faq')
    @include('pages.main.about')
@endsection
