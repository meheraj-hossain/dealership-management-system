<?php

namespace App\Http\Controllers;

use App\SnacksFlavor;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class SnacksFlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='List of Snacks Flavor';
        $data['snacks_flavors']=SnacksFlavor::paginate(2);
        $data['serial']=managePaginationSerial($data['snacks_flavors']);
        return view('admin.business_settings.snacks_flavor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Add new Snacks Flavor';
        return view('admin.business_settings.snacks_flavor.create',$data);
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
            'name'=>'required']
        );
        $Snacks_flavor= new SnacksFlavor();
        $Snacks_flavor->name= $request->name;
        $Snacks_flavor->details=$request->details;
        $Snacks_flavor->status=$request->status;
        $Snacks_flavor->save();
        session()->flash('message','New Snacks Flavor Added');
        return redirect()->route('snacks_flavor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SnacksFlavor  $snacksFlavor
     * @return \Illuminate\Http\Response
     */
    public function show(SnacksFlavor $snacksFlavor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SnacksFlavor  $snacksFlavor
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksFlavor $snacksFlavor)
    {
        $data['title']='Edit Snacks Flavor';
        $data['snacks_flavor']=$snacksFlavor;
        return view('admin.business_settings.snacks_flavor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SnacksFlavor  $snacksFlavor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SnacksFlavor $snacksFlavor)
    {
        $request->validate(
        [
            'name'=>'required',
            'status'=>'required'
        ]
        );
        $snacksFlavor->name=$request->name;
        $snacksFlavor->details=$request->details;
        $snacksFlavor->status=$request->status;
        $snacksFlavor->update();
        session()->flash('message','Snacks Details Updated');
        return redirect()->route('snacks_flavor.edit',$snacksFlavor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SnacksFlavor  $snacksFlavor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnacksFlavor $snacksFlavor)
    {
        $snacksFlavor->delete();
        session()->flash('message','Beverage Flavor Deleted Successfully');
        return redirect()->route('snacks_flavor.index');
    }
}
