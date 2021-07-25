<?php

namespace App\Http\Controllers;

use App\SnacksSize;
use Illuminate\Http\Request;

class SnacksSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Snacks Sizes';
        $data['snacks_sizes']=SnacksSize::paginate(2);
        $data['serial']=managePaginationSerial($data['snacks_sizes']);
        return view('admin.business_settings.snacks_size.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Snacks Size';
        return view('admin.business_settings.snacks_size.create',$data);
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
            'name'=>'required'
        ]);
        $snacks_size = new SnacksSize();
        $snacks_size-> name     = $request->name;
        $snacks_size-> details  = $request->details;
        $snacks_size-> status   = $request->status==null?'Active':$request->status;
        $snacks_size-> save();
        session()->flash('message','New snacks size created successfully');
        return redirect()->route('snacks_size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SnacksSize  $snacksSize
     * @return \Illuminate\Http\Response
     */
    public function show(SnacksSize $snacksSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SnacksSize  $snacksSize
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksSize $snacksSize)
    {
        $data['title'] = 'Edit Snacks Size';
        $data['snacks_size']  = $snacksSize;
        return view('admin.business_settings.snacks_size.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SnacksSize  $snacksSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SnacksSize $snacksSize)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $snacksSize-> name = $request->name;
        $snacksSize-> details = $request->details;
        $snacksSize-> status = $request->status;
        $snacksSize-> update();
        session()->flash('message','Snacks size updated successfully');
        return redirect()->route('snacks_size.edit',$snacksSize->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SnacksSize  $snacksSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnacksSize $snacksSize)
    {
        $snacksSize->delete();
        session()->flash('message','Snacks size deleted successfully');
        return redirect()->route('snacks_size.index');
    }
}
