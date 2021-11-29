<?php

namespace App\Http\Controllers;

use App\BeverageCategory;
use App\BeverageFlavor;
use App\BeverageSize;
use App\BeverageType;
use App\Cart;
use App\Inventory;
use App\SnacksCategory;
use App\SnacksFlavor;
use App\SnacksSize;
use App\SnacksType;
use App\Stock;
use Illuminate\Database\Eloquent\Model;
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
        $data['inventories']=Inventory::with(['BeverageSize','BeverageFlavor','BeverageCategory','BeverageType','SnacksSize','SnacksFlavor','SnacksCategory','SnacksType'])->paginate(15);
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
          $data['beveragetypes']=BeverageType::get();
          return view('admin.inventory.beverages.create',$data);
      }elseif($category=='snacks'){
        $data['title'] = 'Add new Snacks';
        $data['snackscategories']=SnacksCategory::get();
        $data['snackssizes']=SnacksSize::get();
        $data['snacksflavors']=SnacksFlavor::get();
        $data['snackstypes']=SnacksType::get();
        return view('admin.inventory.snacks.create',$data);}
    }

    private function imageUpload($img)
    {
        $path      = 'assets/admin/assets/img/inventories';
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
            'category'=>'required',
            'name'=>'required',
            'details'=>'required',
            'size'=>'required',
            'type'=>'required',
            'flavor'=>'required',
            'purchased_price'=>'required',
            'price_per_carton'=>'required',
            'quantity'=>'required',
            'status'=>'required',
        ]);
        if ($request->image) {
            $photo=$this->imageUpload($request->image);
        }
        $inventory = new Inventory();
        $inventory->inventory_type= $request->inventory_type;
        $inventory-> category_id = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size_id = $request->size;
        $inventory->image = isset($photo)?$photo:null;
        $inventory-> type_id = $request->type;
        $inventory-> flavor_id = $request->flavor;
        $inventory-> price_per_carton = $request->price_per_carton;
        $inventory-> quantity = $request->quantity;
        $inventory-> status = $request->status;
        $inventory-> save();

        $stock = new Stock();
        $stock->inventory_id=$inventory->id;
        $stock->stock=$inventory->quantity;
        $stock->purchased_price=$request->purchased_price;
        $stock->total_purchased_price=$stock->stock*$request->purchased_price;
        $stock->save();
        session()->flash('message','New Product Added successfully');
        return redirect()->route('inventory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $data['title']='Product Details';
        $data['inventory']  = Inventory::with(['BeverageCategory','BeverageSize','BeverageType','BeverageFlavor','SnacksCategory','SnacksSize','SnacksType','SnacksFlavor'])->findOrFail($id);
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
            $data['beveragetypes']=BeverageType::get();
            return view('admin.inventory.beverages.edit',$data);
        } else{
            $data['snackscategories']=SnacksCategory::get();
            $data['snackssizes']=SnacksSize::get();
            $data['snacksflavors']=SnacksFlavor::get();
            $data['snackstypes']=SnacksType::get();
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

        $inventory=Inventory::findOrFail($id);

        if (isset($request->image) && $request->image != null) {
            $photo = $this->imageUpload($request->image);
            if ($inventory->image && file_exists($inventory->image)) {
                unlink($inventory->image);
            }
        } else {
            $photo = $inventory->image;
        }
        $inventory->image=$photo;
        $inventory->inventory_type = $request->inventory_type;
        $inventory-> category_id = $request->category;
        $inventory-> name = $request->name;
        $inventory-> details = $request->details;
        $inventory-> size_id = $request->size;
        $inventory-> type_id = $request->type;
        $inventory-> flavor_id = $request->flavor;
        $inventory-> price_per_carton = $request->price_per_carton;
        $inventory-> quantity = $request->quantity;
        $inventory-> total_price = $request->purchased_price*$request->quantity;
        $inventory-> status = $request->status;
        $inventory-> update();
        session()->flash('message',' Product Updated successfully');
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

    public function showProduct(){

    }
//
//    function AddToCart( Request $request)
//    {
//
//        if (Auth::user()) {
//            $cart= new Cart();
//            $cart->user_id = Auth::user('id')->id;
//            $cart->product_id = $request->product_id;
//            $cart->save();
//            session()->flash('message','Product added to the cart');
//            return redirect()->route('make_order');
//        }
//        else {
//            return redirect('dashboard');
//        }

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
//    static function cartItem()
//        {
//            $user_id = Auth::user('id')->id;
//            return Cart::where('user_id',$user_id)->count();
//        }
//
//    function cartList(){
//        $data['title'] = 'Cart List';
//        $userId = Auth::user('id')->id;
//        $products = DB::table('carts')
//            ->join('inventories','carts.product_id','=','inventories.id')
//            ->where('carts.user_id',$userId)
//            ->select('inventories.*','carts.id as cartId')
//            ->get();
//        $total_price = 0;
//        foreach ($products as $product) {
//            $total_price += $product->price_per_carton;
//        }
//        $data['total_price'] = number_format($total_price,2);
//
//        return view('cart',['products'=>$products],$data);
////        return redirect()->to(route('cart',['inventories'=>$products],$data));
//    }
//
//    public function cartRemove($id)
//    {
//       $cart =Cart::where('id',$id)->first();
//        $cart -> delete();
//        return redirect()->route('cart_list');
//    }
//
//}

