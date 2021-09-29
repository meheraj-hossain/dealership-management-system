<?php

namespace App\Http\Controllers;

use App\AreaManager;
use Illuminate\Http\Request;

class AreaManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Area Manager List';
        $data['area_managers']= AreaManager::paginate(2);
        $data['serial']=managePaginationSerial($data['area_managers']);
        return view('admin.user.area_manager.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Add New Area Manager';
        return view('admin.user.area_manager.create',$data);
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
            'date'=>'required',
            'nid'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'image'=>'required',
            'address'=>'required',
        ]);
        $area_manager = new AreaManager();
        $area_manager-> name = $request->name;
        $area_manager-> date = $request->date;
        $area_manager-> nid = $request->nid;
        $area_manager-> email = $request->email;
        $area_manager-> phone = $request->phone;
        $area_manager-> image = $request->image;
        $area_manager-> address = $request->address;
        $area_manager->save();
        session()->flash('message','Area Manager Details Added Successfully');
        return redirect()->route('area_manager.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function show(AreaManager $areaManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaManager $areaManager)
    {
        $data['title']='Edit Area Manager Details';
        $data['area_manager']=$areaManager;
        return view('admin.user.area_manager.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaManager $areaManager)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'nid'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $areaManager-> name = $request->name;
        $areaManager-> date = $request->date;
        $areaManager-> nid = $request->nid;
        $areaManager-> email = $request->email;
        $areaManager-> phone = $request->phone;
        $areaManager-> image = $request->image;
        $areaManager-> address = $request->address;
        $areaManager->update();
        session()->flash('message','Area Manager Details Updated Successfully');
        return redirect()->route('area_manager.edit',$areaManager->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaManager $areaManager)
    {
        //
    }
}