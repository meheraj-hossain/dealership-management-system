<?php

namespace App\Http\Controllers;
use App\AreaManager;
use App\EmployeeManagement;
use App\Order;
use App\Shopkeeper;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function foo\func;

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

    public function userPortal(){
        $data['title'] = 'Portal';
        $employe_id = User::where('id',auth()->id())->first();

        $data['user'] = User::with(['AreaManager'=>function($query){
            $query->with(['Area']);
        },'Shopkeeper'=>function($query){
            $query->with(['ShopRegistration']);
        }])->where('id',auth()->id())->first();

        $data['salary_status'] = EmployeeManagement::where('employee_id',$employe_id->row_id)->latest()->first();

        $data['due'] = Order::where('user_id',auth()->id())->where('order_status','Approved')->sum('total');
        $data['paid'] = Transaction::where('user_id',auth()->id())->sum('paid_amount');
        return view('admin.user.portal',$data);

    }
}
