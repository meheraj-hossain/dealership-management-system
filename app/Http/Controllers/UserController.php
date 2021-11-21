<?php

namespace App\Http\Controllers;
use App\AreaManager;
use App\Shopkeeper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'action_table'=>'required',
            'password'=>'required|min:8',
        ]);
        $user           = new User();
        $user->row_id =$request->assigned_user;
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->action_table    = $request->action_table;
        $user->password = Hash::make($request->password);
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
    public function destroy(User $user,  $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('message','User deleted successfully');
        return redirect()->route('user.index');
    }

    public function getData( Request $request)
    {
        if ($request->userRole == 'App\AreaManager') {
            $data['user'] = AreaManager::get();
        }
        elseif ($request->userRole == 'App\Shopkeeper') {
            $data['user'] = Shopkeeper::get();
        }
        return $data;
    }
}
