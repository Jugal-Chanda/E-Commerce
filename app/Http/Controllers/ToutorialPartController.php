<?php

namespace App\Http\Controllers;

use App\Toutorial_Part;
use App\Toutorial;
use Illuminate\Http\Request;

class ToutorialPartController extends Controller
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
        return view('admin.parts.create',['toutorials'=>Toutorial::all()]);
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
          'toutorial'=> 'required',
          'code'=> 'required',
          'title'=> 'required',
        ]);
        $part = new Toutorial_Part;
        $part->title = $validateData['title'];
        $part->code = $validateData['code'];
        $part->toutorial_id = $validateData['toutorial'];
        $part->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Toutorial_Part  $toutorial_Part
     * @return \Illuminate\Http\Response
     */
    public function show(Toutorial_Part $toutorial_Part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Toutorial_Part  $toutorial_Part
     * @return \Illuminate\Http\Response
     */
    public function edit(Toutorial_Part $toutorial_Part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Toutorial_Part  $toutorial_Part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toutorial_Part $toutorial_Part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Toutorial_Part  $toutorial_Part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toutorial_Part $toutorial_Part)
    {
        //
    }
}
