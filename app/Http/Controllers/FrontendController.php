<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Category;
use App\Product;
use App\Offer;
use App\Stock;
use App\Toutorial;
use App\Toutorial_Part;
use App\Order;
use App\User;
use Auth;
use Session;

class FrontendController extends Controller
{
  private function cartCount()
  {
    $cart = app('session')->get('cart');
    if(is_null($cart))
    {
      return 0;
    }
    return count($cart);
  }

    public function contact(Request $request)
    {
    $validatedData = $request->validate([
      'name' =>'required',
      'email'=>'required',
      'message'=>'required'
    ]);
    $user = User::find(7);
    Mail::send('email.contact',[
      'msg' => $validatedData['message']
    ], function ($mail) use ($request){
      $mail->from($request->email,$request->name);
      $mail->to(env("MAIL_FROM_ADDRESS"))->subject('Contact Us Message');
    });
    return redirect()->back();
  }

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
      $kit = Category::where('name','kit')->first();

        $toutorials = Toutorial_Part::orderBy('created_at',"DESC")->get();
        return view('index',[
          'kit' => $kit,
          'categories'=>Category::orderBy('name')->get(),
          'products'=>$products->take(12),
          'toutorials'=>$toutorials->take(6),
          'cart_count' => $this->cartCount()
        ]);
    }

    public function categoryWiseProduct(Category $category)
    {
      $products = $category->products();
      if(isset($_GET['search'])){
        $products = $products->where('name','like','%' . $_GET['search'] . '%');
      }
      $kit = Category::where('name','kit')->first();

      return view('category',[
        'kit' => $kit,
        'categories'=>Category::all(),
        'products'=>$products->paginate(2),
        'cart_count' =>$this->cartCount()
      ]);
    }

    public function productSingle(Product $product)
    {
      return view('productSingle',[
        'product'=>$product,
        'cart_count' =>$this->cartCount()
      ]);
    }

    public function orders()
    {
      $user = Auth::user();
      if($user->customer){
        $customer = $user->customer;
        $orders = Order::where('customer_id',$customer->id);
        $orders = $orders->where('status',1);
        $orders = $orders->orderBy('created_at')->get();
        return view('profile.orders',[
          'orders'=>$orders,
          'cart_count' =>$this->cartCount()
        ]);

      }else{
        return redirect()->back();
      }
    }

    public function moneyRecipt(Order $order)
    {
      return view('profile.moneyrecipt',[
        'order'=>$order,
        'cart_count' =>$this->cartCount()
      ]);
    }


    public function toutorials()
    {
      return view('toutorials',[
        'toutorials'=>Toutorial::all(),
        'cart_count' =>$this->cartCount()
      ]);
    }

    public function profile()
    {
      return view('profile.profile',['cart_count' =>$this->cartCount()]);
    }

    public function profileEdit()
    {

      return view('profile.edit',['cart_count' =>$this->cartCount()]);
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
      $user->save();
      Session::flash('status',"Profile updated Successfully");
      return redirect()->back();

    }

    public function offers()
    {
      $offers = Offer::whereNull('promo_code')->orderBy('created_at','desc')->get()->unique('stock_id');
      return view('offers',[
        'offers'=>$offers,
        'cart_count' =>$this->cartCount()
      ]);

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
        return view('mycart',[
          'carts'=>$carts,
          'cart_count' =>$this->cartCount()
        ]);
    }

    public function increaseQuantity ($id)
    {
        $carts = Session::get('cart');
        $carts[$id]['quantity']++;

        Session::put('cart', $carts);

        return redirect()->back();
    }

    public function decreaseQuantity ($id)
    {
        $carts = Session::get('cart');
        if($carts[$id]['quantity'] != 1){
          $carts[$id]['quantity']--;
        }
        Session::put('cart', $carts);

        return redirect()->back();
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
        return view('checkout',[
          'carts'=>$carts,
          'cart_count' =>$this->cartCount()
        ]);
    }
}
