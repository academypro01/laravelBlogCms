@extends('admin.layouts.app')

@section('title')
   Edit Category
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
            <h3 class="card-title">Edit Category : {{$category->title}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('categories.update', $category->id)}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Title</label>
                    <input value="{{$category->title}}" type="text" name="title" id="name" class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <label for="slug">Slug</label>
                    <input value="{{$category->slug}}" type="text" name="slug" placeholder="Slug" id="slug" class="form-control">
                </div>
                <div class="form-group">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10" placeholder="meta description...">{{$category->meta_description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" cols="30" rows="10" placeholder="meta keywords...">{{$category->meta_keywords}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
        <form action="{{route('categories.destroy', $category->id)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
@endsection
