<?php

namespace App\Http\Controllers;

use App\Shopkeeper;
use Illuminate\Http\Request;

class ShopkeeperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Shopkeeper List';
        $data['shopkeepers']= Shopkeeper::paginate(10);
        $data['serial']=managePaginationSerial($data['shopkeepers']);
        return view('admin.user.shopkeeper.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Add New Shopkeeper';
        return view('admin.user.shopkeeper.create',$data);
    }

    private function imageUpload($img)
    {
        $path      = 'assets/admin/assets/img/shopkeeper';
        $file_name = time() . rand('00000', '99999') . '.' . $img->getClientOriginalExtension();
        $img->move($path, $file_name);
        $fullpath = $path . '/' . $file_name;
        return $fullpath;
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
        if ($request->image) {
            $photo=$this->imageUpload($request->image);
        }
        $shopkeeper = new Shopkeeper();
        $shopkeeper-> name = $request->name;
        $shopkeeper-> date = $request->date;
        $shopkeeper-> nid = $request->nid;
        $shopkeeper-> email = $request->email;
        $shopkeeper-> phone = $request->phone;
        $shopkeeper-> image = isset($photo)?$photo:null;
        $shopkeeper-> address = $request->address;
        $shopkeeper->save();
        session()->flash('message','Shopkeeper Details Added Successfully');
        return redirect()->route('shopkeeper.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shopkeeper  $shopkeeper
     * @return \Illuminate\Http\Response
     */
    public function show(Shopkeeper $shopkeeper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shopkeeper  $shopkeeper
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopkeeper $shopkeeper)
    {
        $data['title']='Edit Shopkeeper Details';
        $data['shopkeeper']=$shopkeeper;
        return view('admin.user.shopkeeper.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shopkeeper  $shopkeeper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shopkeeper $shopkeeper)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'nid'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        if (isset($request->image) && $request->image != null) {
            $photo = $this->imageUpload($request->image);
            if ($shopkeeper->image && file_exists($shopkeeper->image)) {
                unlink($shopkeeper->image);
            }
        } else {
            $photo = $shopkeeper->image;
        }

        $shopkeeper-> name = $request->name;
        $shopkeeper-> date = $request->date;
        $shopkeeper-> nid = $request->nid;
        $shopkeeper-> email = $request->email;
        $shopkeeper-> phone = $request->phone;
        $shopkeeper-> address = $request->address;
        $shopkeeper->update();
        session()->flash('message','Shopkeeper Details Updated Successfully');
        return redirect()->route('shopkeeper.edit',$shopkeeper->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shopkeeper  $shopkeeper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopkeeper $shopkeeper)
    {
        if ($shopkeeper->image && file_exists($shopkeeper->image)){
            unlink($shopkeeper->image);
        }
        $shopkeeper->delete();
        session()->flash('message','Shopkeeper Details deleted Successfully');
        return redirect()->route('shopkeeper.index');
    }
}
