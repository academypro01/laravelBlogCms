@extends('front.layouts.app')

@section('title')
    {{$post->title}}
@endsection

@section('metaTags')
    <meta name="description" content="{{$post->meta_description}}">
@endsection

@section('content')
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="image col-sm-12 text-center" style="text-align:center; display: flex;justify-content: center; align-items: center">
                <img src="{{$post->photo->path}}" class="d-block text-center" style="border: 4px solid black;" alt="">
            </div>
            <div class="title m-2 p-2">
                <h2>{{$post->title}}</h2>
            </div>
            <div class="contents m-2 p-2" style="line-height: 25px">
                {{$post->description}}
            </div>
            <div class="infos col-sm-12" style="display: flex; justify-content: space-between; color: #5352ed">
                <div class="p-2">
                    {{$post->category->title}}
                </div>
                <div class="p-2">
                    {{$post->user->name}}
                </div>
                <div class="p-2">
                    {{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
                </div>
            </div>

        </div>
    </div>
@endsection
