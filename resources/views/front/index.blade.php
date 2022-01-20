@extends('front.layouts.app')

@section('title')
    Home Page
@endsection

@section('metaTags')
    <meta name="description" content="{{$lastPost->meta_description}}">
@endsection

@section('content')
    <div class="container">
        <div class="row" data-aos="fade-up">
            <div class="col-xl-8 stretch-card grid-margin">
                <div class="position-relative">
                    <img
                        src="{{$lastPost->photo->path}}"
                        alt="banner"
                        class="img-fluid"
                    />
                    <div class="banner-content">
                        <a href="{{route('front.show.post', $lastPost->slug)}}"><h1 class="mb-0">{{$lastPost->title}}</h1></a>
                        <h1 class="mb-2">
                            {{\Illuminate\Support\Str::limit($lastPost->description, 20)}}
                        </h1>
                        <div class="fs-12">
                            <span class="mr-2">{{$lastPost->category->title}} </span>{{\Illuminate\Support\Carbon::parse($lastPost->created_at)->diffForHumans()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 stretch-card grid-margin">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h2>Latest Posts</h2>
                        @foreach($limitPost as $post)
                        <div class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between">
                            <div class="pr-3">
                                <a href="{{route('front.show.post', $post->slug)}}"><h5>{{$post->title}}</h5></a>
                                <div class="fs-12">
                                    <span class="mr-2">{{$post->category->title}} </span>{{\Illuminate\Support\Carbon::parse($post->created_at)->diffForHumans()}}
                                </div>
                            </div>
                            <div class="rotate-img">
                                <img
                                    src="{{$post->photo->path}}"
                                    alt="thumb"
                                    class="img-fluid img-lg"
                                />
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-3 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h2>Category</h2>
                        <ul class="vertical-menu">
                            @foreach($categories as $category)
                            <li><a href="{{route('front.posts.category', $category->slug)}}">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">

                        @foreach($posts as $post)

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

                        @endforeach
                    </div>
                    <div class="text-center">{{$posts->links()}}</div>
                </div>
            </div>
        </div>


    </div>
@endsection
