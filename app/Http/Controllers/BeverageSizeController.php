<?php

namespace App\Http\Controllers;

use App\BeverageSize;
use Illuminate\Http\Request;

class BeverageSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Beverage Sizes';
        $data['beverage_sizes']=BeverageSize::paginate(20);
        $data['serial']=managePaginationSerial($data['beverage_sizes']);
        return view('admin.business_settings.beverage_size.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Beverage Size';
        return view('admin.business_settings.beverage_size.create',$data);
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
        $beverage_size = new BeverageSize();
        $beverage_size-> name = $request->name;
        $beverage_size-> details = $request->details;
        $beverage_size-> status = $request->status;
        $beverage_size-> save();
        session()->flash('message','New beverage size created successfully');
        return redirect()->route('beverage_size.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BeverageSize  $beverageSize
     * @return \Illuminate\Http\Response
     */
    public function show(BeverageSize $beverageSize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeverageSize  $beverageSize
     * @return \Illuminate\Http\Response
     */
    public function edit(BeverageSize $beverageSize)
    {
        $data['title'] = 'Edit Beverage Size';
        $data['beverage_size']  = $beverageSize;
        return view('admin.business_settings.beverage_size.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BeverageSize  $beverageSize
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeverageSize $beverageSize)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $beverageSize-> name = $request->name;
        $beverageSize-> details = $request->details;
        $beverageSize-> status = $request->status;
        $beverageSize-> update();
        session()->flash('message','Beverage size updated successfully');
        return redirect()->route('beverage_size.edit',$beverageSize->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeverageSize  $beverageSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeverageSize $beverageSize)
    {
        $beverageSize->delete();
        session()->flash('message','Beverage size deleted successfully');
        return redirect()->route('beverage_size.index');
    }
}
