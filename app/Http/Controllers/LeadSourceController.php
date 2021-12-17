<?php

namespace App\Http\Controllers;

use App\LeadSource;
use Illuminate\Http\Request;

class LeadSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leadsources=LeadSource::paginate(25);
        return view('admin.lead_source.index',compact('leadsources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lead_source.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LeadSource::create($request->all());
        return redirect()->route('leadsources.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function show(LeadSource $leadSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function edit(LeadSource $leadSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeadSource $leadSource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeadSource  $leadSource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = LeadSource::find($id);
        $item->delete();
        return redirect()->back();
    }
}
