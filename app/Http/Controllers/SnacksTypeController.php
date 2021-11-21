<?php

namespace App\Http\Controllers;

use App\SnacksType;
use Illuminate\Http\Request;

class SnacksTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Snacks Types';
        $data['snacks_types']=SnacksType::paginate(2);
        $data['serial']=managePaginationSerial($data['snacks_types']);
        return view('admin.business_settings.snacks_type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Snacks Type';
        return view('admin.business_settings.snacks_type.create',$data);
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
        $snacks_type = new SnacksType();
        $snacks_type-> name = $request->name;
        $snacks_type-> details = $request->details;
        $snacks_type-> status = $request->status;
        $snacks_type-> save();
        session()->flash('message','New Snacks type created successfully');
        return redirect()->route('snacks_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SnacksType  $snacksType
     * @return \Illuminate\Http\Response
     */
    public function show(SnacksType $snacksType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SnacksType  $snacksType
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksType $snacksType)
    {
        $data['title'] = 'Edit Snacks Type';
        $data['snacks_type']  = $snacksType;
        return view('admin.business_settings.snacks_type.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SnacksType  $snacksType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SnacksType $snacksType)
    {
        $request->validate([
            'name'=>'required',
            'details'=>'required'
        ]);

        $snacksType-> name = $request->name;
        $snacksType-> details = $request->details;
        $snacksType-> status = $request->status;
        $snacksType-> update();
        session()->flash('message','Snacks type updated successfully');
        return redirect()->route('snacks_type.edit',$snacksType->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SnacksType  $snacksType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnacksType $snacksType)
    {
        $snacksType->delete();
        session()->flash('message','Snacks type deleted successfully');
        return redirect()->route('snacks_type.index');
    }
}
