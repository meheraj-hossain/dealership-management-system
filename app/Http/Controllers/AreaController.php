<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='List of Areas';
        $data['areas']=Area::paginate(10);
        $data['serial']=managePaginationSerial($data['areas']);
        return view('admin.business_settings.Area.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['title']='Add New Area';
       return view('admin.business_settings.area.create',$data);
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
            'status'=>'required'

        ]);
        $area= new Area();
        $area-> name=$request->name;
        $area-> status=$request->status;
        $area->save();
        session()->flash('message','New Area Added Successfully');
        return redirect()->route('area.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit(Area $area)
    {
        $data['title']='Edit Area';
        $data['area']=$area;
        return view('admin.business_settings.area.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name'=>'required',

        ]);

        $area-> name = $request ->name;
        $area-> status = $request->status;
        $area->update();
        session()->flash('message','Area Updated Successfully');
        return redirect()->route('area.edit',$area->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Area $area)
    {
        $area->delete();
        session()->flash('message','Area deleted successfully');
        return redirect()->route('area.index');
    }
}
