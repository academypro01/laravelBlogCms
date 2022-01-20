@extends('front.layouts.app')

@section('title')
    {{$category->title}}
@endsection

@section('content')
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Category: {{$category->title}}</h2>
                        @foreach($posts as $post)
                            @if($post->category->title === $category->title)
                            <div class="row">
                                <div class="col-sm-4 grid-margin">
                                    <div class="position-relative">
                                        <div class="rotate-img">
                                            <img
                                                src="{{$post->photo->path}}"
                                                alt="thumb"
                                                class="img-fluid"
                                            />
                                        </div>
                                        <div class="badge-positioned">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8  grid-margin">
                                    <a href="{{route('front.show.post', $post->slug)}}">
                                        <h2 class="mb-2 font-weight-600">
                                            {{$post->title}}
                                        </h2>
                                    </a>
                                    <div class="fs-13 mb-2">
                                        <span class="mr-2">{{$post->category->title}} </span>{{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
                                    </div>
                                    <p class="mb-0">
                                        {{\Illuminate\Support\Str::limit($post->description), 50,'...'}}
                                    </p>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
