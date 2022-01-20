@extends('admin.layouts.app')

@section('title')
    Create New Category
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
            <h3 class="card-title">Add new Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('categories.store')}}" enctype="multipart/form-data">
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
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" cols="30" rows="10" placeholder="meta description..."></textarea>
                </div>
                <div class="form-group">
                    <label for="meta_keywords">Meta Keywords</label>
                    <textarea name="meta_keywords" id="meta_keywords" class="form-control" cols="30" rows="10" placeholder="meta keywords..."></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
