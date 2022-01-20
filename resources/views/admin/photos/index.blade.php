@extends('admin.layouts.app')

@section('title')
    All Photos
@endsection

@section('content')
    <div class="col-12">
        @if (\Illuminate\Support\Facades\Session::has('delete_photo'))
            <div class="alert alert-danger">
                {{session('delete_photo')}}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('add_photo'))
            <div class="alert alert-success">
                {{session('add_photo')}}
            </div>
        @endif
        @if (\Illuminate\Support\Facades\Session::has('update_photo'))
            <div class="alert alert-info">
                {{session('update_photo')}}
            </div>
        @endif
        <div class="card">
            <!-- ./card-header -->
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>User</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td>
                                <img src="{{$photo->path}}" alt="photo" width="70">
                            </td>
                            <td>{{$photo->name}}</td>
                            <td>{{$photo->user->name}}</td>
                            <td>
                                <form action="{{route('photos.destroy', $photo->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-12" style="text-align:center !important;">{{$photos->links()}}</div>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->
    </div>
@endsection
