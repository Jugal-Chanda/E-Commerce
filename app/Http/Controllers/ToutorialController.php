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
        //
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
      $validatedData = $request->validate([
        'name' => 'required',
        'product'=>'required'
      ]);

      $toutorial = new Toutorial;
      $toutorial->name = $validatedData['name'];
      $toutorial->save();
      $toutorial->products()->attach($request->product);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function edit(Toutorial $toutorial)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toutorial  $toutorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toutorial $toutorial)
    {
        //
    }
}
