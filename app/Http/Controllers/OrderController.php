<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Customer;
use App\Order;
use App\OderProduct;
use Session;


class OrderController extends Controller
{
  public function placeorder(Request $request)
  {
      // dd($request);
      $this->validate($request,[
          'full_name' => 'required',
          'email' => 'required|email',
          'phone' => 'required',
          'address' => 'required',
          'town_city' => 'required',
          'state_country' => 'required',
          'postcode_zip' => 'required',
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
      $total = 50;
      $cart = Session::get('cart');
      foreach ($cart as $key => $product) {
        $orderproduct = new OderProduct;
        $orderproduct->order_id = $order->id;
        $orderproduct->product_id = $key;
        $orderproduct->quantity = $product['quantity'];
        $orderproduct->price = $product['price'];
        $total += $orderproduct->quantity*$orderproduct->price;
        $orderproduct->save();
      }
      $order->total_price = $total;
      $order->save();
      return view('orderPlaceConfirm');
      // dd($order->id);
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
