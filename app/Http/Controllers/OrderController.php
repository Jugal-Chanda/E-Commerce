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
          ['name' =>  $request->full_name]
      );

      $customer = Customer::firstOrCreate(
          ['user_id' => $user->id],
          [
              'phone' => $request->phone,
              'address' => $request->address,
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

      // dd($order->id);
  }

  public function adminOrders()
  {
    return view('admin.orders',['orders'=>Order::all()]);
  }
  public function orderSingle(Order $order)
  {
    return view('admin.orderSingle',['order'=>$order]);
  }
}
