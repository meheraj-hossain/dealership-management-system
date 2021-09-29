<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use App\BeverageFlavor;
use App\BeverageSize;
use App\Cart;
use App\Inventory;
use App\SnacksCategory;
use App\SnacksFlavor;
use App\SnacksSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Inventory';
        $data['inventories']=Inventory::paginate(2);
        $data['serial']=managePaginationSerial($data['inventories']);
        return view('admin.inventory.index',$data);
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
          $data['beverageflavors']=BeverageFlavor::get();
          return view('admin.inventory.beverages.create',$data);
      }elseif($category=='snacks'){
        $data['title'] = 'Add new Snacks';
        $data['snackscategories']=SnacksCategory::get();
        $data['snackssizes']=SnacksSize::get();
        $data['snacksflavors']=SnacksFlavor::get();
        return view('admin.inventory.snacks.create',$data);}
    }
private function fileupload($img){

    $path = 'images/inventories';
    $img->move($path, $img->getClientOriginalName());
    $fullpath = $path . '/' . $img->getClientOriginalName();
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
        if ($request->image) {
    $photo=$this->fileupload($request->image);
        }
        $inventory = new Inventory();
        $inventory->inventory_type= $request->inventory_type;
        $inventory-> category = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size = $request->size;
        $inventory->image = isset($photo)?$photo:null;
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
    public function show($id)
    {
        $data['title']='Product Details';
        $data['inventory']  = Inventory::findOrFail($id);
        return view('single_product',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($type,$id)
    {
        $data['title'] = 'Edit Product';
        $data['inventory']  = Inventory::findOrFail($id);
        if($type == 'Beverages'){
            $data['beveragecategories']=BeverageCategory::get();
            $data['beveragesizes']=BeverageSize::get();
            $data['beverageflavors']=BeverageFlavor::get();
            return view('admin.inventory.beverages.edit',$data);
        } else{
            $data['snackscategories']=SnacksCategory::get();
            $data['snackssizes']=SnacksSize::get();
            $data['snacksflavors']=SnacksFlavor::get();
            return view('admin.inventory.snacks.edit',$data);
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
            'image'=>'mimes:jpeg,jpg,png',
        ]);
        if ($request->image) {
            $photo=$this->fileupload($request->image);

        }

        $inventory=Inventory::findOrFail($id);
        $inventory->inventory_type = $request->inventory_type;
        $inventory-> category = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size = $request->size;
        if ( file_exists($inventory->image)){
            unlink($inventory->image);
        }
        $inventory->image = isset($photo)?$photo:null;
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
        if ($inventory->image && file_exists($inventory->image)){
            unlink($inventory->image);
        }
        $inventory->delete();
        session()->flash('message','Beverage category deleted successfully');
        return redirect()->route('inventory.index');
    }

    function AddToCart( Request $request)
    {

        if (Auth::user()) {
            $cart= new Cart();
            $cart->user_id = Auth::user('id')->id;
            $cart->product_id = $request->product_id;
            $cart->save();
            session()->flash('message','Product added to the cart');
            return redirect()->route('make_order');
        }
        else {
            return redirect('dashboard');
        }

//        $cart= new Cart();
//        $cart->user_id =1;
//        $cart->product_id = $request->product_id;
//        $cart->save();
//        session()->flash('message','Product Added to the cart');
//        return redirect()->route('make_order');
    }
//    static function CartItem(){
//        $userId = Session::get()
//    }
    static function cartItem()
        {
            $user_id = Auth::user('id')->id;
            return Cart::where('user_id',$user_id)->count();
        }

    function cartList(){
        $data['title'] = 'Cart List';
        $userId = Auth::user('id')->id;
        $products = DB::table('carts')
            ->join('inventories','carts.product_id','=','inventories.id')
            ->where('carts.user_id',$userId)
            ->select('inventories.*','carts.id as cartId')
            ->get();
        $total_price = 0;
        foreach ($products as $product) {
            $total_price += $product->price_per_carton;
        }
        $data['total_price'] = number_format($total_price,2);

        return view('cart',['products'=>$products],$data);
//        return redirect()->to(route('cart',['inventories'=>$products],$data));
    }

    public function cartRemove($id)
    {
       $cart =Cart::where('id',$id)->first();
        $cart -> delete();
        return redirect()->route('cart_list');
    }

}

