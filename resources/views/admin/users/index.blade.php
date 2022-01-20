@extends('admin.layouts.app')

@section('title')
    Users List
@endsection


@section('content')
    <div class="col-12">
        @if (\Illuminate\Support\Facades\Session::has('user_deleted'))
            <div class="alert alert-danger">
                {{session('user_deleted')}}
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
                        <th>Status</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            @if ($user->photo)
                                <img src="{{asset($user->photo->path)}}" alt="" width="70px">
                            @endif
                        </td>
                        <td>
                            <a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a>
                        </td>
                        <td>
                            @if ($user->status == 0)
                                <button class="btn btn-danger">Deactive</button>
                            @else
                                <button class="btn btn-success">Active</button>
                            @endif
                        </td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>
                        @foreach($user->roles as $role)
                        {{$role->name}}<br>
                        @endforeach
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
