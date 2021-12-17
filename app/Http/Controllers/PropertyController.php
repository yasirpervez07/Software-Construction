<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Agent;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\GlobalClass;
use App\Property;
use App\PropertyFor;
use App\PropertyImage;
use App\PropertyType;
use App\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public $globalclass;
    public function __construct()
    {
        $this->globalclass = new GlobalClass;

    }

    public function search(Request $request)
    {
        $str = explode(',', $request->search_areas);
        $area = $str[0];
        $area_id = $str[1];

        $properties = Property::where($area, $area_id)->paginate(25)->setPath('');
        $pagination = $properties->appends(array(
            'search_areas' => $request->search_areas
        ));

        return response()->json([
            'data' => $properties
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // dd(auth()->user());
        if (auth()->user()->role->name == 'Agency') {

            $properties = Property::where('agency_id', auth()->user()->agency->id)
                ->orderBy('created_at', 'desc')->paginate(25);
        }

        if (auth()->user()->role->name == 'Administrator') {
            $properties = Property::orderBy('created_at', 'desc')->paginate(25);
        }
        if (auth()->user()->role->name == 'Agents') {
            // dd(auth()->user()->Agent->agency_id);
            $properties = Property::where('user_id', auth()->user()->id)
                ->orWhere('agency_id', auth()->user()->Agent->agency_id)->paginate(25);
        }


        // if(auth()->user()->role->name == 'Agent' ){

        // }

        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();

        return view('admin.property.index', compact('properties', 'area_one', 'area_two'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(auth()->user()->agency->id);
        if (auth()->user()->role->name == 'Agency') {
            $users = Agent::where('agency_id', auth()->user()->agency->id)->get();
        } else {
            $users = User::all();
        }
        if (auth()->user()->role->name == 'Agents') {

            $users = Agent::where('user_id', auth()->user()->id)->get();
        }
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();
        $area_three = AreaThree::all();
        $propertyfor = PropertyFor::all();
        $propertytype = PropertyType::all();
        return view('admin.property.create', compact(['users', 'area_one', 'area_two', 'area_three', 'propertyfor', 'propertytype']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->user()->role->name == 'Agency') {
            $agency = Agency::where('user_id', auth()->user()->id)->first();
            $property = Property::create($request->except('images', 'agency_id') + ['agency_id' => $agency->id]);
        }
        if (auth()->user()->role->name == 'Agents') {
            $agency =  Agent::where('user_id', auth()->user()->id)->first();
            $property = Property::create($request->except('images', 'agency_id') + ['agency_id' => $agency->agency_id]);

        } else {
            $property = Property::create($request->except('images'));
        }
        if ($request->images != null) {
            $this->globalclass->storeMultipleS3($request->file('images'), 'properties', $property->id);
        }
        return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('admin.property_image.edit', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = Property::find($id);

        if (auth()->user()->role->name == 'Agency' || auth()->user()->role->name == 'Agents') {
            if ($property->agency->id == auth()->user()->agency->id ||  $property->user->id == auth()->user()->id) {
                $users = User::all();
                $area_one = AreaOne::all();
                $area_two = AreaTwo::all();
                $area_three = AreaThree::all();
                $propertyfor = PropertyFor::all();
                return view('admin.property.edit', compact(['property', 'users', 'area_one', 'area_two', 'area_three', 'propertyfor']));
            } else {
                return redirect()->route('properties.index');
            }
        }



        $users = User::all();
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();
        $area_three = AreaThree::all();
        $propertyfor = PropertyFor::all();

        return view('admin.property.edit', compact(['property', 'users', 'area_one', 'area_two', 'area_three', 'propertyfor']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = Property::find($id);
        if (auth()->user()->role->name == 'Agents') {
            if ($property->user_id == auth()->user()->id) {
                $property->update($request->all());
                return redirect()->route('properties.index');
            } else {
                return redirect()->route('properties.index');
            }
        }
        $property->update($request->all());
        return redirect()->route('properties.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::find($id);
        $property->delete();
        return redirect()->back();
    }
    public function filter(Request $request)
    {


        $properties = Property::orderBy('created_at', 'desc')->paginate(25);
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();

        $area_one = AreaOne::orderBy('created_at', 'desc');
        $area_two = AreaTwo::orderBy('created_at', 'desc');
        $properties = Property::orderBy('created_at', 'desc');

        if (isset($request->type)) {
            $properties = $properties->where('properties.type', $request->type);
        }
        if (isset($request->description)) {
            $properties = $properties->where('properties.description', $request->description);
        }

        if (isset($request->area_one_id)) {
            $properties = $properties->where('properties.area_one_id', $request->area_one_id);
        }
        if (isset($request->area_two_id)) {
            $properties = $properties->where('properties.area_two_id', $request->area_two_id);
        }


        $properties = $properties->paginate(25);
        $area_one = $area_one->paginate(25);
        $area_two = $area_two->paginate(25);

        $pagination = $properties->appends(array(
            'type' => $request->type,
            'description' => $request->description,
            'area_two_id' => $request->area_two_id,
            'area_one_id' => $request->area_one_id,
        ));

        return view('admin.property.index', compact('properties', 'area_one', 'area_two'));
    }
}
