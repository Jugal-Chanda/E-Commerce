<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Session;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::orderBy('created_at')->get();
        return view('admin.announcement.index',['announcements'=>$announcements]);
    }

    public function toggleVisible(Announcement $announcement)
    {
      $announcement->visible = !$announcement->visible;
      $announcement->save();
      Session::flash('status', 'Change the visibility of announcement');
      return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcement.create');
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
          'announcement' => 'required'
        ]);
        $announcement = new Announcement;
        $announcement->announcement = $validateData['announcement'];
        $announcement->save();
        Session::flash('status',"New Announcement Added");
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view('admin.announcement.edit',['announcement'=>$announcement]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        $validateData = $request->validate([
          'announcement' => 'required'
        ]);
        $announcement->announcement = $validateData['announcement'];
        $announcement->save();
        Session::flash('status','Announcement is updated.');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        Session::flash('status','One announcement is deleted');
        return redirect()->back();
    }
}
