<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['roles','photo'])->get();
        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create',compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $user = new User();

        $file = $request->file('avatar');
        $name = uniqid().time().$file->getClientOriginalName();
        $file->move('images', $name);

        $photo = new Photo();
        $photo->name = $file->getClientOriginalName();
        $photo->path = $name;
        $photo->user_id = Auth::id();
        $photo->save();


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->photo_id = $photo->id;
        $user->save();

        $user->roles()->attach($request->roles);

        return redirect(route('users.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        if($request->file('avatar') != null) {

            $file = $request->file('avatar');
            $name = uniqid() . time() . $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();
            $photo->save();
            $user->photo_id = $photo->id;
        }


        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        $user->status = $request->status;

        $user->save();

        $user->roles()->sync($request->roles);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $photo = Photo::findOrFail($user->photo_id);
        unlink(public_path() . $photo->path);
        $user->delete();
        $photo->delete();
        \Illuminate\Support\Facades\Session::flash('user_deleted','user successfully deleted');
        return redirect(route('users.index'));
    }
}
