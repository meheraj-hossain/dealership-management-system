<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use App\BeverageSize;
use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Beverages';
        $data['inventories']=Inventory::paginate(2);
        $data['serial']=managePaginationSerial($data['inventories']);
        return view('admin.inventory.beverages.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category)
    {
      if ($category=='beverages'){
          $data['title'] = 'Add new Beverage';
          $data['beveragecategories']=BeverageCategory::get();
          $data['beveragesizes']=BeverageSize::get();
          return view('admin.inventory.beverages.create',$data);
      }else{
        $data['title'] = 'Add new Snacks';
        return view('admin.inventory.Snacks.create',$data);}
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
            'category'=>'required',
            'name'=>'required',
            'details'=>'required',
            'size'=>'required',
            'type'=>'required',
            'flavor'=>'required',
            'price_per_carton'=>'required',
            'quantity'=>'required',
            'status'=>'required',
        ]);

        $inventory = new Inventory();
        $inventory->inventory_type= $request->inventory_type;
        $inventory-> category = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size = $request->size;
        $inventory-> image = $request->image;
        $inventory-> type = $request->type;
        $inventory-> flavor = $request->flavor;
        $inventory-> price_per_carton = $request->price_per_carton;
        $inventory-> quantity = $request->quantity;
        $inventory-> total_price = $request->price_per_carton*$request->quantity;
        $inventory-> status = $request->status;
        $inventory-> save();
        session()->flash('message','New Beverage Added successfully');
        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($type,$id)
    {

        if($type == 'Beverage'){
            $data['title'] = 'Edit Product';
            $data['inventory']  = Inventory::findOrFail($id);
            $data['beveragecategories']=BeverageCategory::get();
            $data['beveragesizes']=BeverageSize::get();
            return view('admin.inventory.beverages.edit',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category'=>'required',
            'name'=>'required',
            'details'=>'required',
            'size'=>'required',
            'type'=>'required',
            'flavor'=>'required',
            'price_per_carton'=>'required',
            'quantity'=>'required',
            'status'=>'required',
        ]);
        $inventory=Inventory::findOrFail($id);
        $inventory->inventory_type= $request->inventory_type;
        $inventory-> category = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size = $request->size;
        $inventory-> image = $request->image;
        $inventory-> type = $request->type;
        $inventory-> flavor = $request->flavor;
        $inventory-> price_per_carton = $request->price_per_carton;
        $inventory-> quantity = $request->quantity;
        $inventory-> total_price = $request->price_per_carton*$request->quantity;
        $inventory-> status = $request->status;
        $inventory-> update();
        session()->flash('message','New Beverage Added successfully');
        return redirect()->route('inventory.edit',[$inventory->inventory_type,$id]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory, $id)
    {
        $inventory=Inventory::findOrFail($id);
        $inventory->delete();
        session()->flash('message','Beverage category deleted successfully');
        return redirect()->route('inventory.index');
    }
}
