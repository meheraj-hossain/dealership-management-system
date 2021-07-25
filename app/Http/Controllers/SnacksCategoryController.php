<?php

namespace App\Http\Controllers;

use App\SnacksCategory;
use Illuminate\Http\Request;

class SnacksCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Snacks Categories';
        $data['snacks_categories']=SnacksCategory::paginate(2);
        $data['serial']=managePaginationSerial($data['snacks_categories']);
        return view('admin.business_settings.snacks_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create new Snacks Category';
        return view('admin.business_settings.snacks_category.create',$data);
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

        $snacks_category = new SnacksCategory();
        $snacks_category-> name     = $request->name;
        $snacks_category-> details  = $request->details;
        $snacks_category-> status   = $request->status==null?'Active':$request->status;
        $snacks_category-> save();
        session()->flash('message','New snacks category created successfully');
        return redirect()->route('snacks_category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SnacksCategory  $snacksCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SnacksCategory $snacksCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SnacksCategory  $snacksCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SnacksCategory $snacksCategory)
    {
        $data['title'] = 'Edit Snacks Category';
        $data['snacks_category']  = $snacksCategory;
        return view('admin.business_settings.snacks_category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SnacksCategory  $snacksCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SnacksCategory $snacksCategory)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $snacksCategory-> name     = $request->name;
        $snacksCategory-> details  = $request->details;
        $snacksCategory-> status   = $request->status;
        $snacksCategory-> update();
        session()->flash('message','New snacks category updated successfully');
        return redirect()->route('snacks_category.edit',$snacksCategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SnacksCategory  $snacksCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SnacksCategory $snacksCategory)
    {
        $snacksCategory->delete();
        session()->flash('message','Snacks category deleted successfully');
        return redirect()->route('snacks_category.index');
    }
}
