<?php

namespace App\Http\Controllers;

use App\BeverageFlavor;
use Illuminate\Http\Request;

class BeverageFlavorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Beverage Flavors Categories';
        $data['beverage_flavors']=BeverageFlavor::paginate(2);
        $data['serial']=managePaginationSerial($data['beverage_flavors']);
        return view('admin.business_settings.beverage_flavor.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Beverage Flavor';
        return view('admin.business_settings.beverage_flavor.create',$data);
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
        $beverage_flavor = new BeverageFlavor();
        $beverage_flavor-> name = $request->name;
        $beverage_flavor-> details = $request->details;
        $beverage_flavor-> status = $request->status;
        $beverage_flavor-> save();
        session()->flash('message','New beverage flavor created successfully');
        return redirect()->route('beverage_flavor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BeverageFlavor  $beverageFlavor
     * @return \Illuminate\Http\Response
     */
    public function show(BeverageFlavor $beverageFlavor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeverageFlavor  $beverageFlavor
     * @return \Illuminate\Http\Response
     */
    public function edit(BeverageFlavor $beverageFlavor)
    {
        $data['title'] = 'Edit Beverage Flavor';
        $data['beverage_flavor']  = $beverageFlavor;
        return view('admin.business_settings.beverage_flavor.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BeverageFlavor  $beverageFlavor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeverageFlavor $beverageFlavor)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $beverageFlavor-> name = $request->name;
        $beverageFlavor-> details = $request->details;
        $beverageFlavor-> status = $request->status;
        $beverageFlavor-> update();
        session()->flash('message','Beverage Flavor updated successfully');
        return redirect()->route('beverage_flavor.edit',$beverageFlavor->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeverageFlavor  $beverageFlavor
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeverageFlavor $beverageFlavor)
    {
        $beverageFlavor->delete();
        session()->flash('message','Beverage Flavor Deleted Successfully');
        return redirect()->route('beverage_flavor.index');
    }
}
