{{HTML::style('css/user/profile.css')}}
@extends('layout.default')
@section('content')
@include('user.headerimage')
<div class="profile-content">
    <div class="row col-md-1"></div>
    <div class="row col-md-4">
        @include('user.badge')
    </div>
    <div class="row col-md-1"></div>
    <div class="row col-md-5">
        @include('post.list')
    </div>
 </div>
@stop