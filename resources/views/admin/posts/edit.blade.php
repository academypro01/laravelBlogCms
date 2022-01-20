@extends('admin.layouts.app')

@section('title')
    Edit Post
@endsection

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">

            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Post : {{$post->title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('posts.update', [$post->id])}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input value="{{$post->title}}" type="text" name="title" id="name" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input value="{{$post->slug}}" type="text" name="slug" placeholder="Slug" id="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="description">{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea name="meta_title" id="meta_title" class="form-control" placeholder="meta keywords..." cols="30" rows="10">{{$post->meta_title}}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10">{{$post->meta_description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" aria-label="default select example">
                        @foreach($categories as $category)
                            <option

                                @if ($category->id == $post->category->id)
                                    selected
                                @endif

                                value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{  ($post->status == '0') ? 'selected' : '' }}>Deactive</option>
                        <option value="1" {{  ($post->status == '1') ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <img src="{{$post->photo->path}}" alt="post photo" width="100">
                    <br>
                    <label for="exampleInputFile">Post photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="photo" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
        </form>
        <form action="{{route('posts.destroy',[$post->id])}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
