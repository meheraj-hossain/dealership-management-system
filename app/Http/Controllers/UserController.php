<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='All Users';
        $data['users']=User::paginate(2);
        $data['serial']=managePaginationSerial($data['users']);
        return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new user';
        return view('admin.user.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:8',
        ]);
        $user           = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = md5($request->password);
        $user->save();
        session()->flash('message','New user created successfully');
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        $data['title'] = 'Edit user';
//        $data['user']  = User::findOrFail($id);
//
//        return view('admin.user.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //        $request->validate([
//            'name'=>'required',
//            'email'=>'required|unique:users,id,'.$id,
//            'password'=>'required|min:8',
//        ]);
//        $user           = new User();
//        $user->name     = $request->name;
//        $user->email    = $request->email;
//        $user->password = md5($request->password);
//        $user->save();
//        session()->flash('message','New user created successfully');
//        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('message','User deleted successfully');
        return redirect()->route('user.index');
    }
}
