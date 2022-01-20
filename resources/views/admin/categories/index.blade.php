@extends('admin.layouts.app')

@section('title')
    Categories List
@endsection

@section('content')
    <div class="col-12">
        @if (\Illuminate\Support\Facades\Session::has('delete_category'))
            <div class="alert alert-danger">
                {{session('delete_category')}}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('add_category'))
            <div class="alert alert-success">
                {{session('add_category')}}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('update_category'))
            <div class="alert alert-info">
                {{session('update_category')}}
            </div>
        @endif
        <div class="card">
            <!-- ./card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                <a href="{{route('categories.edit', $category->id)}}">{{$category->title}}</a>
                            </td>
                            <td>{{$category->meta_description}}</td>
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
