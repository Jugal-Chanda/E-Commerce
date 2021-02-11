<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Order;
use App\OderProduct;
use App\Offer;
use Auth;
use Session;


class OrderController extends Controller
{


  public function placeorder(Request $request)
  {
      $this->validate($request,[
          'full_name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required',
          'town_city' => 'required',
          'state_country' => 'required',
          'postcode_zip' => 'required',
          'delivery' => 'required',
          'payment_method' => 'required'
      ]);


      $user = User::firstOrCreate(
          ['email' => $request->email],
          ['name' =>  $request->full_name],
          ['phone' => $request->phone],
          ['address' => $request->address],
      );

      $customer = Customer::firstOrCreate(
          ['user_id' => $user->id],
          [
              'town_city' => $request->town_city,
              'state_country' => $request->state_country,
              'postcode_zip' => $request->postcode_zip,
          ]
      );
      $order  = new Order;
      $order->customer_id = $customer->id;
      $order->order_no = time();
      $order->payment_mathod = $request->payment_method;
      $order->total_price = 0;
      $order->save();



      $cart = Session::get('cart');
      $total = 0;
      foreach ($cart as $key => $product) {
        $orderproduct = new OderProduct;
        $orderproduct->order_id = $order->id;
        $orderproduct->product_id = $key;
        $orderproduct->quantity = $product['quantity'];
        $orderproduct->price = $product['price'];
        $total += $orderproduct->quantity*$orderproduct->price;
        $orderproduct->save();
      }

      $offer = null;
      if($request->promo){
        $offer = Offer::where('promo_code',$request->promo)->first();
        if(!is_null($offer)){
          $order->discount = ($total * ($offer->percentage/100));
          $total = $total - ($total * ($offer->percentage/100));
        }
      }

      if($request->delivery == "in_dhaka")
      {
        $order->delivery_address = 1;
        $total+=60;
      }else{
        $order->delivery_address = 0;
        $total+=100;
      }

      $order->total_price = $total;
      $order->save();
      Session::flash('status',"You product will delivered with in 2 days!!");
      return redirect()->route('moneyRecipt',['order'=>$order]);
  }

  public function adminOrders()
  {
    $orders = Order::where('status','1')->orWhereNull('status')->orderBy('status','asc')->orderBy('delivered','asc')->orderBy('created_at','DESC')->get();
    return view('admin.orders',['orders'=>$orders]);
  }
  public function orderSingle(Order $order)
  {
    return view('admin.orderSingle',['order'=>$order]);
  }

  public function confirm(Order $order)
  {
    $order->status = true;
    $order->save();
    Session::flash('status',$order->order_no." is confirmed.");
    return redirect()->route('admin.orders');
  }

  public function decline(Order $order)
  {
    $order->status = false;
    $order->save();
    Session::flash('status',$order->order_no." is declined.");
    return redirect()->route('admin.orders');
  }

  public function delivered(Order $order)
  {
    $order->delivered = true;
    $order->save();
    Session::flash('status',$order->order_no." is delivered.");
    return redirect()->route('admin.orders');
  }
}
