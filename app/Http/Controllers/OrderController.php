<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function home()
    {
        $data['title'] = 'Make Order';
        $data['products'] = Inventory::paginate(5);
        return view('make_order', $data);
    }
}

