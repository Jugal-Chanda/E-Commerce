<?php

namespace App\Http\Controllers;

use App\Toutorial;
use App\Product;
use Session;
use Illuminate\Http\Request;

class ToutorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.toutorials.index',['toutorials'=>Toutorial::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.toutorials.create',['products'=>Product::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $uploadPath = "upload/toutorials/";
      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
        'thumbnail' => 'required',
      ]);

      $image = $request->thumbnail;
      $image_new_name = time().$image->getClientOriginalName();
      $image->move($uploadPath,$image_new_name);

      $toutorial = Toutorial::create([
        'name' => $validatedData['name'],
        'description' => $validatedData['description'],
        'thumbnail' => $uploadPath.$image_new_name,
      ]);
      if($request->product){
        $toutorial->products()->attach($request->product);
      }
      Session::flash('status','Toutorial Playlist added successfully');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function show(Toutorial $toutorial)
    {
        return view('admin.toutorials.show',['toutorial'=>$toutorial]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Toutorial $toutorial)
    {
        return view('admin.toutorials.edit',['toutorial'=>$toutorial,'products'=>Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toutorial $toutorial)
    {
      $uploadPath = "upload/toutorials/";
      $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'required',
      ]);
      $toutorial->name = $validatedData['name'];
      $toutorial->description = $validatedData['description'];

      if($request['thumbnail']){
        $image = $request->thumbnail;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move($uploadPath,$image_new_name);
        $toutorial->thumbnail = $uploadPath.$image_new_name;
      }
      $toutorial->products()->attach($request->product);
      Session::flash('status','Toutorial Playlist Updated successfully');
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toutorial $toutorial)
    {
      $toutorial->delete();
      return redirect()->back();
    }
}
