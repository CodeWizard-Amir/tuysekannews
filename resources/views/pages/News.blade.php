@extends('layout.mainlayout')
@section('body')
    @include('layout.header')
    @include('components.website-path',['breadcrumbs_name'=>'news',"heading_content"=>"اخبار"])
    @include('layout.footer')
@endsection