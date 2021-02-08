<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Offer;
use App\Stock;
use App\Toutorial;
use App\Toutorial_Part;
use App\Order;
use Auth;
use Session;

class FrontendController extends Controller
{

    public function home()
    {
      if(isset($_GET['search'])){
        $products = Product::where('name','like','%' . $_GET['search'] . '%')->get();
        $products = $products->sortByDesc(function ($product){
          return $product->ordered->sum('quantity');
        });
      }else{
        $products = Product::all();
        $products = $products->sortByDesc(function ($product){
          return $product->ordered->sum('quantity');
        });
      }


        $toutorials = Toutorial_Part::orderBy('created_at',"DESC")->get();
        return view('index',['categories'=>Category::all(),'products'=>$products->take(12),'toutorials'=>$toutorials->take(6)]);
    }
    public function categoryWiseProduct(Category $category)
    {
      $products = $category->products();
      if(isset($_GET['search'])){
        $products = $products->where('name','like','%' . $_GET['search'] . '%');
      }

      return view('category',['categories'=>Category::all(),'products'=>$products->paginate(2)]);
    }
    public function productSingle(Product $product)
    {
      return view('productSingle',['product'=>$product]);
    }
    // public function search()
    // {
    //     $pro
    //     $stocks = Stock::whereRaw('quantity > sold')->orderBy('created_at')->distinct('product_id');
    //     return view('index',['categories'=>Category::all(),'stocks'=>$stocks->paginate(2),'cart_count'=> $cart_count]);
    // }
    public function orders()
    {
      $user = Auth::user();
      if($user->customer){
        $customer = $user->customer;
        $orders = Order::where('customer_id',$customer->id)->get();
        return view('profile.orders',['orders'=>$orders]);

      }else{
        return redirect()->back();
      }
    }

    public function moneyRecipt(Order $order)
    {
      return view('profile.moneyrecipt',['order'=>$order]);
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
    public function profileUpdate(Request $request)
    {
      $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required'],
        'address' => ['required']
      ]);
      $user = Auth::user();
      $user->name = $validatedData['name'];
      $user->phone = $validatedData['phone'];
      $user->address = $validatedData['address'];
      Session::flash('status',"Profile updated Successfully");
      return redirect()->back();

    }
    public function offers()
    {
      $offers = Offer::orderBy('created_at','desc')->get()->unique('stock_id');
      return view('offers',['offers'=>$offers]);

    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        $product_price = 0;
        if($product->hasStock()){
          $temp =  $product->price();
          if($product->stock()->hasOffer()){
            $product_price = $temp['offer'];
          }else{
            $product_price = $temp['original'];
          }
        }
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
                            "price" => $product_price,
                            "photo" => $product->image1
                        ]
                ];

                Session::put('cart', $cart);
                return redirect()->back();
            }

            // if cart not empty then check if this product exist then increment quantity
            if(isset($cart[$id])) {

                $cart[$id]['quantity']++;

                Session::put('cart', $cart);

                return redirect()->back();

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product_price,
                "photo" => $product->image1
            ];

            Session::put('cart', $cart);
        }
        return redirect()->back();
    }
    public function myCart()
    {
        $carts = Session::get('cart');
        return view('mycart',['carts'=>$carts]);
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
