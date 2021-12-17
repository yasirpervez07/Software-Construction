<?php

namespace App\Http\Controllers;

use App\GlobalClass;
use App\PropertyImage;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class PropertyImageController extends Controller
{

    public $globalclass;

    public function __construct(){
        $this->globalclass=new GlobalClass;
    }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyImage  $propertyImage
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyImage $propertyImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyImage  $propertyImage
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyImage $propertyImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyImage  $propertyImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyImage $propertyImage)
    {
        $this->globalclass->storeMultipleS3($request->file('images'),'properties',$request->property_id);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyImage  $propertyImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $propertyImage=PropertyImage::find($id);
        $propertyImage->delete();
        return redirect()->back();
    }
}
