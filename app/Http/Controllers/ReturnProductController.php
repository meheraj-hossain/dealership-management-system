<?php

namespace App\Http\Controllers;

use App\Area;
use App\BeverageCategory;
use App\BeverageFlavor;
use App\BeverageSize;
use App\BeverageType;
use App\Inventory;
use App\Order;
use App\OrderDetail;
use App\ReturnProduct;
use App\SnacksCategory;
use App\SnacksFlavor;
use App\SnacksSize;
use App\SnacksType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReturnProductController extends Controller
{
    public function index(){
        $data['title'] = 'Return Products List';
        $user  = User::where('id', Auth::id())->first();
        if ($user->action_table == 'App\AreaManager'){
            $data['areas'] = Area::with([
                'ShopRegistration' => function ($query) {
                    $query->with([
                        'ReturnProducts'=>function ($query){
                        $query->with('Inventory');
                        },'Shopkeeper']);}])->where('id', $user->ids->area_id)->first();
            return view('admin.return_products.area_manager_index',$data);
        }elseif ($user->action_table == 'App\Shopkeeper'){
            $data['return_Products'] = ReturnProduct::with(['User','Inventory'])->latest()->paginate(10);
            $data['serial']  = managePaginationSerial($data['return_Products']);
            return view('admin.return_products.index',$data);
        }elseif ($user->action_table == 'App\Admin'){
            $data['deliveries'] = ReturnProduct::with(['Inventory',
                'User' => function ($query) {
                    $query->with(['Shopkeeper' => function ($query) {
                        $query->with('ShopRegistration');}]);}])->where('status','!=','Pending')->orderBy('updated_at','DESC')->get();
            return view('admin.return_products.admin_index',$data);
        }


    }

    public function create(){

        $data['products'] = Order::with(['OrderDetail'=>function ($query){
            $query->with(['inventory'=>function($query){
                $query->with(['BeverageCategory','BeverageSize', 'BeverageType', 'BeverageFlavor','SnacksCategory', 'SnacksFlavor','SnacksType','SnacksSize']);
            }]);
        }])->where('user_id',Auth::user()->id)->where('order_status','Delivered')->get();

        $data['categories']=BeverageCategory::all();
        $data['sizes']=BeverageSize::all();
        $data['flavors']=BeverageFlavor::all();
        $data['types']=BeverageType::all();
        $data['stypes']=SnacksType::all();
        $data['sflavors']=SnacksFlavor::all();
        $data['ssizes']=SnacksSize::all();
        $data['scategories']=SnacksCategory::all();
        $data['title'] = 'Create Return Products List';
        return view('admin.return_products.create',$data);
    }

    public function store( Request $request){
         $shop_id = User::with(['Shopkeeper'=>function($query){
            $query->with(['ShopRegistration']);
        }])->where('id',Auth::user()->id)->first();
        foreach ($request->id as $product_id){
            $inventory=Inventory::where('id', $product_id)->first();
            $return_products = new ReturnProduct();
            $return_products->user_id = Auth::user()->id;
            $return_products->shop_id = $shop_id->Shopkeeper->ShopRegistration->id;
            $return_products->product_id = $inventory->id;
            $return_products->quantity = $request->quantity[$product_id];
            $return_products->save();
            session()->flash('message','Your Request is Pending');
            return redirect()->route('return_products.index');
        }
    }

    public function edit($id){
        $data['title']= 'Check Reason';
        $data['return_product'] =  ReturnProduct::with(['Inventory'])->findOrFail($id);
        return view('admin.return_products.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'details'=>'required',
            'quantity'=>'required|gt:0',
            'name'=>'required'
        ]);

        $return_product =  ReturnProduct::findOrFail($id);
        $return_product->quantity = $request->quantity;
        $return_product->reason = $request->details;
        $return_product->status = 'Checked';
        $return_product->update();
        session()->flash('message','Status Updated Successfully');
        return redirect()->route('return_products.area_manager_index');
    }

    public function destroy($id)
    {
        $return_product=ReturnProduct::findOrFail($id);
        $return_product->delete();
        session()->flash('message','Request Deleted Successfully');
        return redirect()->route('return_products.area_manager_index');
    }

    public function approve($id){
        $return_product = ReturnProduct::findOrFail($id);
        $return_product->status = 'Approved';
        $return_product->update();
        session()->flash('message','Request Approved');
        return redirect()->back();
    }
}
