<?php

namespace App\Http\Controllers;

use App\BeverageType;
use Illuminate\Http\Request;

class BeverageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Beverage Types';
        $data['beverage_types']=BeverageType::paginate(2);
        $data['serial']=managePaginationSerial($data['beverage_types']);
        return view('admin.business_settings.beverage_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Beverage Type';
        return view('admin.business_settings.beverage_type.create',$data);
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
        $beverage_type = new BeverageType();
        $beverage_type-> name = $request->name;
        $beverage_type-> details = $request->details;
        $beverage_type-> status = $request->status;
        $beverage_type-> save();
        session()->flash('message','New beverage type created successfully');
        return redirect()->route('beverage_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BeverageType  $beverageType
     * @return \Illuminate\Http\Response
     */
    public function show(BeverageType $beverageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeverageType  $beverageType
     * @return \Illuminate\Http\Response
     */
    public function edit(BeverageType $beverageType)
    {
        $data['title'] = 'Edit Beverage Type';
        $data['beverage_type']  = $beverageType;
        return view('admin.business_settings.beverage_type.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BeverageType  $beverageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeverageType $beverageType)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required'
        ]);

        $beverageType-> name = $request->name;
        $beverageType-> details = $request->details;
        $beverageType-> status = $request->status;
        $beverageType-> update();
        session()->flash('message','Beverage type updated successfully');
        return redirect()->route('beverage_type.edit',$beverageType->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeverageType  $beverageType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeverageType $beverageType)
    {
        $beverageType->delete();
        session()->flash('message','Beverage type deleted successfully');
        return redirect()->route('beverage_type.index');
    }
}
