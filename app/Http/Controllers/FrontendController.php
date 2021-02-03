<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Offer;
use App\Stock;
use App\Toutorial;
use Session;

class FrontendController extends Controller
{
    public function categoryWiseProduct(Category $category)
    {
      return view('category',['categories'=>Category::all(),'products'=>$category->products()->paginate(2)]);
    }
    public function home()
    {
        $cart = Session::get('cart');
        if($cart)
        {
          $cart_count = count(Session::get('cart'));
        }
        else
        {
          $cart_count = 0;
        }
        $stocks = Stock::whereRaw('quantity > sold')->orderBy('created_at')->distinct('product_id');
        return view('index',['categories'=>Category::all(),'stocks'=>$stocks->paginate(2),'cart_count'=> $cart_count]);
    }
    public function toutorials()
    {
      return view('toutorials',['toutorials'=>Toutorial::all()]);
    }
    public function profile()
    {
      return view('profile.profile');
    }
    public function profileEdit($value='')
    {
      return view('profile.edit');
    }
    public function offers()
    {
      $offers = Offer::orderBy('created_at','desc')->get()->unique('stock_id');
      return view('offers',['offers'=>$offers]);

    }
    public function productSingle(Product $product)
    {
      $cart = Session::get('cart');
      if($cart)
      {
        $cart_count = count(Session::get('cart'));
      }
      else
      {
        $cart_count = 0;
      }
      return view('productSingle',['product'=>$product,'cart_count'=> $cart_count]);
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
        if($carts)
        {
          $cart_count = count(Session::get('cart'));
        }
        else
        {
          $cart_count = 0;
        }
        return view('mycart',['cart_count'=> $cart_count,'carts'=>$carts]);
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
