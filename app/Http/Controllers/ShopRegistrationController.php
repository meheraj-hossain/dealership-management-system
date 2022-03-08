<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaManager;
use App\Shopkeeper;
use App\ShopRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area_manager_id = Auth::user()->row_id;
        $area_manager = AreaManager::findOrFail($area_manager_id);
        $data['title']='Shop List';
        $data['shops']=ShopRegistration::with(['Area','Shopkeeper'])->where('area_id',$area_manager->area_id)->paginate(10);
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
       $assigned_shopkeepers = ShopRegistration::all()->pluck('ownerId')->toArray();
       $assigned_shopkeeper = array_unique($assigned_shopkeepers);
       $data['shopkeepers']=Shopkeeper::where('areaManagerId',Auth::user()->id)->whereNotIn('id',$assigned_shopkeeper)->get();
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
            'ownerId'=>'required',
            'address'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:2048',
        ]);

        $shopkeeper = Shopkeeper::findOrFail($request->ownerId);
        $area_manager = AreaManager::findOrFail(Auth::user()->row_id);
        if ($request->image) {
            $photo=$this->imageUpload($request->image);
        }
        $shopRegistration= New ShopRegistration();
        $shopRegistration-> name = $request-> name;
        $shopRegistration-> uniqueId = 'Sh'.sprintf(mt_rand(1,999));
        $shopRegistration-> ownerId = $request-> ownerId;
        $shopRegistration-> area_id = $area_manager->area_id;
        $shopRegistration-> address = $request->address;
        $shopRegistration-> image = isset($photo)?$photo:null;
        $shopkeeper->shop_assigned = 'Yes';
        $shopkeeper->update();
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
            'ownerId'=>'required|unique:shop_registrations,ownerId,'.$shopRegistration->id,
            'address'=>'required',
            'image'=>'mimes:jpeg,png,jpg|max:2048',

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
        $shopRegistration-> ownerId = $request-> ownerId;
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
