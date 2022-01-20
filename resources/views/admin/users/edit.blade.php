@extends('admin.layouts.app')

@section('title')
    Edit User
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
            <h3 class="card-title">Edit User {{$user->name}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PATCH">

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{$user->name}}" type="text" name="name" id="name" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input value="{{$user->email}}" name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="roles">Roles</label>
                    <select name="roles[]" id="roles" class="form-control" multiple="multiple" aria-label="multiple select example">
                        @foreach($roles as $role)
                            <option
                                @foreach ($user->roles as $user_role)
                                    @if ($role->id == $user_role->id)
                                        selected
                                    @endif
                                @endforeach

                                value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" {{  ($user->status == '0') ? 'selected' : '' }}>Deactive</option>
                        <option value="1" {{  ($user->status == '1') ? 'selected' : '' }}>Active</option>
                    </select>
                </div>
                <div class="form-group">
                    @if ($user->photo)
                        <img src="{{$user->photo->path}}" alt="user photo" width="100">
                    @endif
                    <br>
                    <label for="exampleInputFile">Avatar photo</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="avatar" type="file" class="custom-file-input" id="exampleInputFile">
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
                <form action="{{route('users.destroy', [$user->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </form>
    </div>
@endsection

