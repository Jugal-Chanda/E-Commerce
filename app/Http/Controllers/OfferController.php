<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Stock;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function promoCheck(Request $request)
    {
      $data = $request->all();
      $code = $data['code'];
      $offer = Offer::where('promo_code',$code)->first();
      $data = array();
      if($offer){
        $data['status'] = "ok";
        $data['ammount'] = $offer->percentage;
        return response()->json($data,200);
      }
      $data['status'] = "no";
      $data['ammount'] = 0;
      return response()->json($data,200);
    }
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
        $stocks = Stock::whereRaw('quantity > sold')->orderBy('created_at',"DESC")->get();
        return view('admin.offers.create',['stocks'=>$stocks]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
          'percentage'=>'required',
          'stocks' => 'required'
        ]);
        foreach ($validateData['stocks'] as $stock){
          $offer =  new Offer;
          $offer->title = $request['title'];
          $offer->description  =$request['description'];
          $offer->stock_id = $stock;
          $offer->percentage = $validateData['percentage'];
          if($request->promo){
            $offer->promo_code = $request->promo;
          }
          $offer->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
