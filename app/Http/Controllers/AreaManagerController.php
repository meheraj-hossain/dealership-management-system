<?php

namespace App\Http\Controllers;

use App\Area;
use App\AreaManager;
use Illuminate\Http\Request;

class AreaManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']='Area Manager List';
        $data['area_managers']= AreaManager::with(['Area'])->paginate(3);
        $data['serial']=managePaginationSerial($data['area_managers']);
        return view('admin.user.area_manager.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']='Add New Area Manager';
        $data['areas']=Area::get();
        return view('admin.user.area_manager.create',$data);
    }


    private function imageUpload($img)
    {
        $path      = 'assets/admin/assets/img/area_managers';
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
            'area'=>'required',
            'address'=>'required',
            'salary'=>'required',
        ]);
        if ($request->image) {
            $photo=$this->imageUpload($request->image);
        }
        $area_manager = new AreaManager();
        $area_manager-> name = $request->name;
        $area_manager-> date = $request->date;
        $area_manager-> nid = $request->nid;
        $area_manager-> email = $request->email;
        $area_manager-> phone = $request->phone;
        $area_manager-> image = isset($photo)?$photo:null;
        $area_manager-> area_id = $request->area;
        $area_manager-> address = $request->address;
        $area_manager-> salary = $request->salary;
        $area_manager-> status = 'Inactive';
        $area_manager->save();
        session()->flash('message','Area Manager Details Added Successfully');
        return redirect()->route('area_manager.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function show(AreaManager $areaManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function edit(AreaManager $areaManager)
    {
        $data['title']='Edit Area Manager Details';
        $data['areas']=Area::get();
        $data['area_manager']=$areaManager;
        return view('admin.user.area_manager.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AreaManager $areaManager)
    {
        $request->validate([
            'name'=>'required',
            'date'=>'required',
            'nid'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'area'=>'required',
            'address'=>'required',
            'salary'=>'required',
        ]);
        if (isset($request->image) && $request->image != null) {
            $photo = $this->imageUpload($request->image);
            if ($areaManager->image && file_exists($areaManager->image)) {
                unlink($areaManager->image);
            }
        } else {
            $photo = $areaManager->image;
        }
        $areaManager->image=$photo;
        $areaManager-> name = $request->name;
        $areaManager-> date = $request->date;
        $areaManager-> nid = $request->nid;
        $areaManager-> email = $request->email;
        $areaManager-> phone = $request->phone;
        $areaManager-> area_id = $request->area;
        $areaManager-> address = $request->address;
        $areaManager->update();
        session()->flash('message','Area Manager Details Updated Successfully');
        return redirect()->route('area_manager.edit',$areaManager->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AreaManager  $areaManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(AreaManager $areaManager)
    {
        if ($areaManager->image && file_exists($areaManager->image)){
            unlink($areaManager->image);
        }
        $areaManager->delete();
        session()->flash('message','Area Manager Deleted Successfully');
        return redirect()->route('area_manager.index');
    }
}
