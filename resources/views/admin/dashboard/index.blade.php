@extends('admin.layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$users}}</h3>

                    <p>Users</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$posts}}</h3>

                    <p>Posts</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$categories}}</h3>

                    <p>Categories</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$photos}}</h3>

                    <p>Photos</p>
                </div>


            </div>
        </div>
        <!-- ./col -->
        <div class="card col-md-6">
            <div class="card-header">
                <h3 class="card-title">Last Posts</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Photo</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lastPosts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td><img src="{{$post->photo->path}}" alt="post" width="70"></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div><div class="card col-md-6">
            <div class="card-header">
                <h3 class="card-title">Last Signup Users</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lastUsers as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
