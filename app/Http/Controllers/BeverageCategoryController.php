<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use Illuminate\Http\Request;

class BeverageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Beverage Categories';
        $data['beverage_categories']=BeverageCategory::paginate(2);
        $data['serial']=managePaginationSerial($data['beverage_categories']);
        return view('admin.business_settings.beverage_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Beverage Category';
        return view('admin.business_settings.beverage_category.create',$data);
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
        $beverage_category = new BeverageCategory();
        $beverage_category-> name = $request->name;
        $beverage_category-> details = $request->details;
        $beverage_category-> status = $request->status;
        $beverage_category-> save();
        session()->flash('message','New beverage category created successfully');
        return redirect()->route('beverage_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BeverageCategory  $beverageCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BeverageCategory $beverageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BeverageCategory  $beverageCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BeverageCategory $beverageCategory)
    {
        $data['title'] = 'Edit Beverage Category';
        $data['beverage_category']  = $beverageCategory;
        return view('admin.business_settings.beverage_category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BeverageCategory  $beverageCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeverageCategory $beverageCategory)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $beverageCategory-> name = $request->name;
        $beverageCategory-> details = $request->details;
        $beverageCategory-> status = $request->status;
        $beverageCategory-> update();
        session()->flash('message','Beverage category updated successfully');
        return redirect()->route('beverage_category.edit',$beverageCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BeverageCategory  $beverageCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeverageCategory $beverageCategory)
    {
        $beverageCategory->delete();
        session()->flash('message','Beverage category deleted successfully');
        return redirect()->route('beverage_category.index');
    }
}
