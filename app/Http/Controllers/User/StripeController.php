<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;

use App\Mail\OrderMail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class StripeController extends Controller
{
    public function StripeOrder(Request $request){


    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}

	\Stripe\Stripe::setApiKey('sk_test_51Kdqe1Czn2GenGh2T0LBbq8uYAJVHIMXwXe8havc1gPAh6kZhC2VNgqIHlUFI1SpQepN1zsCfoNdJglsQidR2ZNH00Z3QYtPg2');


	$token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create([
	  'amount' => $total_amount,
	  'currency' => 'JPY',
	  'description' => 'Milo Online Store',
	  'source' => $token,
	  'metadata' => ['order_id' => uniqid()],
	]);

	  // dd($charge);

     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'post_code' => $request->post_code,
     	'notes' => $request->notes,

     	'payment_type' => 'Stripe',
     	'payment_method' => 'Stripe',
     	'payment_type' => $charge->payment_method,
     	'transaction_id' => $charge->balance_transaction,
     	'currency' => $charge->currency,
     	'amount' => number_format($total_amount),
     	'order_number' => $charge->metadata->order_id,


     	'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'pending',
     	'created_at' => Carbon::now(),

     ]);

     // Start Send Email
     $invoice = Order::findOrFail($order_id);
     	$data = [
     		'invoice_no' => $invoice->invoice_no,
     		'amount' => $total_amount,
     		'name' => $invoice->name,
     	    'email' => $invoice->email,
     	];

     	Mail::to($request->email)->send(new OrderMail($data));

     // End Send Email


     $carts = Cart::content();
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id,
     		'product_id' => $cart->id,
     		'qty' => $cart->qty,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

     	]);
     }


     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::destroy();

     $notification = array(
			'message' => 'C???m ??n ???? mua h??ng t???i Milo Onlie Shop',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);


    } // end method








}
