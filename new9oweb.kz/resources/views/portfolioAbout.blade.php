@include('layouts.header')
@extends('layouts.head')
<div class="container" style="padding-top: 150px; padding-bottom: 50px;">
    <h1>{{$post->title}}</h1>
    <p>{!! $post->body !!}</p>
    <img src="/storage/{{$post->image}}" class="reviews__client" alt="{{$post->title}}" style="width: 200px; height: auto;">
</div>
@include('layouts.footerCustom')
@include('layouts.footer')