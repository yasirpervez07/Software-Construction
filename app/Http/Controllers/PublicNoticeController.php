<?php

namespace App\Http\Controllers;

use App\Agency;
use App\AreaOne;
use App\AreaTwo;
use App\PublicNotice;
use Illuminate\Http\Request;

class PublicNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicnotices = PublicNotice::paginate(15);

        return view('admin.public_notice.index', compact('publicnotices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areaones = AreaOne::all();
        $areatwos = AreaTwo::all();
        $agencies = Agency::all();

        return view('admin.public_notice.create', compact('areaones', 'areatwos', 'agencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PublicNotice::create($request->all());
        return redirect()->route('publicnotice.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PublicNotice  $publicNotice
     * @return \Illuminate\Http\Response
     */
    public function show(PublicNotice $publicnotice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PublicNotice  $publicNotice
     * @return \Illuminate\Http\Response
     */
    public function edit(PublicNotice $publicnotice)
    {
        $areaones = AreaOne::all();
        $areatwos = AreaTwo::all();
        $agencies = Agency::all();

        return view('admin.public_notice.edit', compact('publicnotice', 'areaones', 'areatwos', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PublicNotice  $publicNotice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PublicNotice $publicnotice)
    {
        $publicnotice->update($request->all());
        return redirect()->route('publicnotice.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PublicNotice  $publicNotice
     * @return \Illuminate\Http\Response
     */
    public function destroy(PublicNotice $publicnotice)
    {
        $publicnotice->delete();
        return redirect()->back();
    }
}
