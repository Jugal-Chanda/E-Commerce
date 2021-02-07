<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.product.create',['categories'=> Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
          'name'=> 'required',
          'model' => 'required',
          'description' => 'required',
          'image1' => 'required|image',
          'image2' => 'required|image',
          'image3' => 'required|image',
          'image4' => 'required|image',
          'category_id' => 'required',
      ]);
      $image1 = $request->image1;
      $image1_new_name = time().$image1->getClientOriginalName();
      $image1->move('upload/products',$image1_new_name);

      $image2 = $request->image2;
      $image2_new_name = time().$image2->getClientOriginalName();
      $image2->move('upload/products',$image2_new_name);

      $image3 = $request->image3;
      $image3_new_name = time().$image3->getClientOriginalName();
      $image3->move('upload/products',$image3_new_name);

      $image4 = $request->image4;
      $image4_new_name = time().$image4->getClientOriginalName();
      $image4->move('upload/products',$image4_new_name);

      $product = Product::create([
          'name' => $request->name,
          'model' => $request->model,
          'description' => $request->description,
          'image1' => 'upload/products/'.$image1_new_name,
          'image2' => 'upload/products/'.$image2_new_name,
          'image3' => 'upload/products/'.$image3_new_name,
          'image4' => 'upload/products/'.$image4_new_name,
          'category_id' => $request->category_id
      ]);
      Session::flash('status','New Product Added');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      Product::destroy($product->id);
      Session::flash('status',$product->name." is deleted");
      return redirect()->route('product.index');
    }
}
