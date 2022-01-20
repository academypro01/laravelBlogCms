@extends('admin.layouts.app')

@section('title')
    Posts List
@endsection

@section('content')
    <div class="col-12">
        @if (\Illuminate\Support\Facades\Session::has('delete_post'))
            <div class="alert alert-danger">
                {{session('delete_post')}}
            </div>
        @endif
            @if (\Illuminate\Support\Facades\Session::has('add_post'))
                <div class="alert alert-success">
                    {{session('add_post')}}
                </div>
            @endif
            @if (\Illuminate\Support\Facades\Session::has('update_post'))
                <div class="alert alert-info">
                    {{session('update_post')}}
                </div>
            @endif
        <div class="card">
            <!-- ./card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Category</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td><img src="{{$post->photo->path}}" alt="post photo" width="70"></td>
                        <td>
                            <a href="{{route('posts.edit', [$post->id])}}">{{$post->title}}</a>
                        </td>
                        <td>{{ \Illuminate\Support\Str::limit($post->description, 50, '...') }}</td>
                        <td>{{$post->user->email}}</td>
                        <td>{{$post->category->title}}</td>
                        <td>
                            @if ($post->status == 0)
                                <button class="btn btn-danger">Deactive</button>
                            @else
                                <button class="btn btn-success">Active</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection
