<?php

namespace App\Http\Controllers;

use App\PropertyFor;
use Illuminate\Http\Request;

class PropertyForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->keyword) {
            $propertyfor = PropertyFor::paginate(25);

        } else {
            $propertyfor = PropertyFor::where('name', 'like', '%' . $request->keyword . '%')
                ->paginate(25)->setPath('');
            $pagination = $propertyfor->appends(array(
                'keyword' => $request->keyword
            ));
        }
        return view('admin.property_for.index', compact('propertyfor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyfor = PropertyFor::all();

        return view('admin.property_for.create', compact('propertyfor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PropertyFor::create($request->all());
        return redirect()->route('propertyfor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyFor  $propertyFor
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyFor $propertyFor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyFor  $propertyFor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propertyfor = PropertyFor::find($id);

        return view("admin.property_for.edit", compact('propertyfor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyFor  $propertyFor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $propertyfor = PropertyFor::find($id);
        $propertyfor->update($request->all());

        return redirect()->route('propertyfor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyFor  $propertyFor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PropertyFor::find($id);
        $item->delete();
        return redirect()->back();
    }
}
