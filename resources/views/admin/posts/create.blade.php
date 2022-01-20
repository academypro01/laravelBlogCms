@extends('admin.layouts.app')

@section('title')
    Create New Post
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
            <h3 class="card-title">Add new Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input type="text" name="title" id="name" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" placeholder="Slug" id="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="10" placeholder="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_title">Meta Title</label>
                    <textarea name="meta_title" id="meta_title" class="form-control" placeholder="meta keywords..." cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10"></textarea>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control" aria-label="default select example">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0">Deactive</option>
                        <option value="1">Active</option>
                    </select>
                </div>
                <div class="form-group">
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
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
