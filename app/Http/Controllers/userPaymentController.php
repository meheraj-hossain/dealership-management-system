<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;

class userPaymentController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'amount'=>'required'
        ]);
        $user=User::with(['ShopKeeper'=>function($query){
            $query->with(['ShopRegistration']);
        }])->where('id',Auth::user()->id)->first();

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $user->Shopkeeper->name;
        $post_data['cus_email'] = $user->email;
        $post_data['cus_add1'] = $user->Shopkeeper->address;

        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $user->Shopkeeper->address;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = $user->Shopkeeper->ShopRegistration->name;
        $post_data['ship_add1'] = $user->Shopkeeper->ShopRegistration->address;
        $post_data['ship_add2'] = "";
        $post_data['ship_city'] = "";
        $post_data['ship_state'] = "";
        $post_data['ship_postcode'] = "";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Transaction";
        $post_data['product_category'] = "Payment";
        $post_data['product_profile'] = "non-physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = Auth::id();
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request){
        $transaction = new Transaction();
        $transaction->user_id = $request->value_a;
        $transaction->transaction_id = $request->tran_id;
        $transaction->paid_amount = $request->amount;
        $transaction->paid_amount = $request->amount;
        $transaction->save();
        session()->flash('message','Transaction is completed successfully');
        return redirect()->route('user.portal');
    }
    public function fail(Request $request){
        session()->flash('error','Transaction is failed');
        return redirect()->route('user.portal');
    }
    public function cancel(Request $request){
        session()->flash('error','Transaction is canceled');
        return redirect()->route('user.portal');
    }
}
