@extends('layout.mainlayout')
@section('title', "تویسرکان | آخرین اخبار ")

@section('body')
@include('components.mobile-menu')

    @include('layout.header')
    @include('components.website-path',['breadcrumbs_name'=>'news',"heading_content"=>"اخبار"])

    @include('layout.footer')
@endsection