@extends('layout.mainlayout')
@section('body')
    @include('layout.header')
    @include('components.website-path',['breadcrumbs_name'=>'works',"heading_content"=>"آثار تویسرکانی ها"])
    @include('layout.footer')
@endsection