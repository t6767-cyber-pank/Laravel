@include('layouts.header')
@extends('layouts.head')
<div class="container" style="padding-top: 150px; padding-bottom: 50px;">
    <h1>{{$pageAboutUs->title}}</h1>
    <p>{!! $pageAboutUs->body !!}</p>
    <img src="/storage/{{$pageAboutUs->image}}" class="reviews__client" alt="{{$pageAboutUs->title}}" style="width: 80%; height: auto;">
</div>
@include('layouts.footerCustom')
@include('layouts.footer')