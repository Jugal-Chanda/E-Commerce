<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Session;

class FrontendController extends Controller
{
    public function home()
    {
        return view('home',['categories'=>Category::all(),'products'=>Product::all()]);
    }
    public function productSingle(Product $product)
    {
      return view('productSingle',['product'=>$product]);
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart');
        if($product->hasStock())
        {
            $cart = Session::get('cart');

            // if cart is empty then this the first product
            if(!$cart) {

                $cart = [
                        $id => [
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->price(),
                            "photo" => $product->image1
                        ]
                ];

                Session::put('cart', $cart);

                return redirect()->back()->with('cartCount', 1);
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {

                $cart[$id]['quantity']++;

                Session::put('cart', $cart);

                return redirect()->back()->with('cartCount',count($cart));

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price(),
                "photo" => $product->image1
            ];

            Session::put('cart', $cart);
        }
        return redirect()->back()->with('cartCount',$cart?count($cart):0);;
    }
    public function myCart()
    {
        $carts = Session::get('cart');
        return view('mycart')->with('carts',$carts);
    }
    public function increaseQuantity ($id)
    {
        $carts = Session::get('cart');
        $carts[$id]['quantity']++;

        Session::put('cart', $carts);

        return redirect()->back()->with('cartCount',count($carts));
    }

    public function decreaseQuantity ($id)
    {
        $carts = Session::get('cart');
        $carts[$id]['quantity']--;

        Session::put('cart', $carts);

        return redirect()->back()->with('cartCount',count($carts));
    }

    public function deleteFromCart($id)
    {
        $carts = Session::get('cart');
        unset($carts[$id]);
        Session::put('cart', $carts);
        return redirect()->back();
    }

    public function checkout()
    {
        $carts = Session::get('cart');
        if(!$carts){
            return redirect()->back();
        }
        if(!count($carts)){
            return redirect()->back();
        }
        return view('checkout')->with('carts',$carts);
    }
}
