<?php

namespace App\Http\Controllers;

use App\Area;
use App\Shopkeeper;
use App\ShopRegistration;
use Illuminate\Http\Request;

class ShopRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Shop List';
        $data['shops']=ShopRegistration::with(['Area','Shopkeeper'])->paginate(2);
        $data['serial']=managePaginationSerial($data['shops']);
        return view('admin.shop_registration.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data['title']='Register New Shop';
       $data['areas']=Area::get();
       $data['shopkeepers']=Shopkeeper::get();
       return view('admin.shop_registration.create',$data);
    }

    private function imageUpload($img)
    {
        $path      = 'assets/admin/assets/img/shop';
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
            'uniqueId'=>'required',
            'ownerId'=>'required',
            'area'=>'required',
            'address'=>'required',


        ]);

        $photo =$this->imageUpload($request->image);
        $shopRegistration= New ShopRegistration();
        $shopRegistration-> name = $request-> name;
        $shopRegistration-> uniqueId = $request-> uniqueId;
        $shopRegistration-> ownerId = $request-> ownerId;
        $shopRegistration-> area_id = $request-> area;
        $shopRegistration-> address = $request->address;
        $shopRegistration-> image = isset($photo)?$photo:null;
        $shopRegistration->save();
        session()->flash('message','New Shop Registered');
        return redirect()-> route('shop_registration.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(ShopRegistration $shopRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopRegistration $shopRegistration)
    {
        $data['title']='Edit Shop Details';
        $data['areas']=Area::get();
        $data['shopkeepers']=Shopkeeper::get();
        $data['shop']=$shopRegistration;
        return view('admin.shop_registration.edit',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopRegistration $shopRegistration)
    {
        $request->validate([
            'name'=>'required',
            'uniqueId'=>'required',
            'ownerId'=>'required',
            'area'=>'required',
            'address'=>'required',

        ]);
        if (isset($request->image) && $request->image != null) {
            $photo = $this->imageUpload($request->image);
            if ($shopRegistration->image && file_exists($shopRegistration->image)) {
                unlink($shopRegistration->image);
            }
        } else {
            $photo = $shopRegistration->image;
        }
        $shopRegistration->image=$photo;
        $shopRegistration-> name = $request-> name;
        $shopRegistration-> uniqueId = $request-> uniqueId;
        $shopRegistration-> ownerId = $request-> ownerId;
        $shopRegistration-> area_id = $request-> area;
        $shopRegistration-> address = $request->address;

        $shopRegistration->update();
        session()->flash('message','New Shop Registered');
        return redirect()-> route('shop_registration.edit',$shopRegistration->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShopRegistration  $shopRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopRegistration $shopRegistration)
    {
        if ($shopRegistration->image && file_exists($shopRegistration->image)){
            unlink($shopRegistration->image);
        }
        $shopRegistration->delete();
        session()->flash('message','Shop Details Deleted Successfully');
        return redirect()->route('shop_registration.index');
    }
}
