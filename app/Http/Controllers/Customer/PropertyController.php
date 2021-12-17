<?php

namespace App\Http\Controllers\Customer;

use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\City;
use App\GlobalClass;
use App\Http\Controllers\Controller;
use App\Property;
use App\PropertyFor;
use App\PropertyImage;
use App\PropertyType;
use App\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public $globalclass;
    public $devicecheck;

    public function __construct()
    {
        $this->globalclass = new GlobalClass;
        $this->devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $properties = $this->search($request);
            if ($request->view == 1) {
                return view('frontend2.property.featured', compact('properties'));
            }
            return view('frontend2.property.list-item', compact('properties'));
        }
        if (isset($request->searched)) {
            $str = explode(',', $request->searched);
            $area = $str[0];
            $area_id = $str[1];
            $properties = Property::with('areaOne','areaTwo','images')->where($area, $area_id)->paginate(8);
            return view('frontend2mobile.property.index', compact('properties'));
        }

        if (isset($request->search)) {
            $properties = $this->search($request);
            return view('frontend2.home.properties', compact('properties'));
        }

        $properties = Property::paginate(8);
        return $this->devicecheck == 1
            ? view('frontend2mobile.property.index',compact('properties'))
            : view('frontend2.home.properties');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return $this->devicecheck == 1
        ? view('frontend2mobile.property.single',compact('property'))
        : view('frontend2.property.single', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function search(Request $request)
    {
        if (isset($request->nearby)) {
            $radius = 10;
            $properties = Property::select(\
            DB::raw('*,( 3959 * acos( cos( radians(' . $request->latitude . ') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians(' . $request->longitude . ') ) + sin( radians(' . $request->latitude . ') ) * sin( radians(latitude) ) ) ) AS distance'))->paginate(25);
        }

        if (isset($request->id)) {
            $properties = Property::where('id', $request->id)->first();
        }

        $global = new GlobalClass;
        $search = '';
        $properties = Property::with(['images'])->where('id', '!=', null)->whereHas('images', function ($query) use ($search) {
            $query->where('name', '!=', null);
        });
        $pagination_array = array();

        if ($request->view == 1) {
            $pagination_array = $this->array_push_assoc($pagination_array, 'view', 1);
            $pagination_array = $this->array_push_assoc($pagination_array, 'search', 2);

        }
        if ($request->view == 2) {
            $pagination_array = $this->array_push_assoc($pagination_array, 'view', 2);
            $pagination_array = $this->array_push_assoc($pagination_array, 'search', 2);
        }

        if (isset($request->search_areas)) {
            $str = explode(',', $request->search_areas);
            $area = $str[0];
            $area_id = $str[1];
            $pagination_array = array('search_areas' => $request->search_areas);
            $properties = $properties->where($area, $area_id);
            $search = '';

            $properties = $properties->whereHas('images', function ($query) use ($search) {
                $query->where('name', '!=', null);
            });
            $pagination_array = $this->array_push_assoc($pagination_array, 'search_areas', $request->search_areas);
        }
        if (isset($request->agency_id)) {
            $properties->where('agency_id', $request->agency_id);
            $pagination_array = $this->array_push_assoc($pagination_array, 'agency_id', $request->agency_id);
        }
        if (isset($request->firebase_id)) {
            $user = User::where('firebase_id', $request->firebase_id)->first();
            $properties->where('user_id', $user->id);
            $pagination_array = $this->array_push_assoc($pagination_array, 'firebase_id', $request->firebase_id);
        }
        if (isset($request->deleted)) {
            $properties->where('deleted', $request->deleted);
            $pagination_array = $this->array_push_assoc($pagination_array, 'deleted', $request->deleted);
        }
        if (isset($request->status)) {
            $properties->where('status', $request->status);
            $pagination_array = $this->array_push_assoc($pagination_array, 'status', $request->status);
        }
        if (isset($request->city)) {
            $search = $request->city;
            $properties = $global->searchRelation($properties, 'areaOne', 'city_id', $search);
            $pagination_array = $this->array_push_assoc($pagination_array, 'city', $request->city);
        }
        if (isset($request->bed)) {
            $properties->where('bed', $request->bed);
            $pagination_array = $this->array_push_assoc($pagination_array, 'bed', $request->bed);
        }
        if (isset($request->property_for)) {

            $properties->where('property_for', $request->property_for);
            $pagination_array = $this->array_push_assoc($pagination_array, 'property_for', $request->property_for);
        }
        if (isset($request->property_type)) {
            // $property_types = explode(',', $request->property_type);
            // $properties->whereIn('property_type', $property_types);
            $properties->where('property_type', $request->property_type);
            $pagination_array = $this->array_push_assoc($pagination_array, 'property_type', $request->property_type);
        }
        if (isset($request->bath)) {
            $properties->where('bath', $request->bath);
            $pagination_array = $this->array_push_assoc($pagination_array, 'bath', $request->bath);
        }
        if (isset($request->featured)) {
            $properties->where('featured', $request->featured);
            $pagination_array = $this->array_push_assoc($pagination_array, 'featured', $request->featured);
        }
        if (isset($request->size)) {
            $properties->where('size', $request->size);
            $pagination_array = $this->array_push_assoc($pagination_array, 'size', $request->size);
        }
        if (isset($request->area_type)) {
            $properties->where('type', $request->area_type);
            $pagination_array = $this->array_push_assoc($pagination_array, 'area_type', $request->area_type);
        }
        if (isset($request->max_price) || isset($request->min_price)) {
            if ($request->min_price == null) {
                $request->min_price = 0;
            }
            if ($request->max_price == null) {
                $request->max_price = 9999999999;
            }
            $properties->whereBetween('price', [$request->min_price, $request->max_price]);
            $pagination_array = $this->array_push_assoc($pagination_array, 'min_price', $request->min_price);
            $pagination_array = $this->array_push_assoc($pagination_array, 'max_price', $request->max_price);
        }
        if (isset($request->max_area) || isset($request->min_area)) {
            if ($request->min_area == null) {
                $request->min_area = 0;
            }
            if ($request->max_area == null) {
                $request->max_area = 999999999;
            }
            $properties->whereBetween('size', [$request->min_area, $request->max_area]);
            $pagination_array = $this->array_push_assoc($pagination_array, 'min_area', $request->min_area);
            $pagination_array = $this->array_push_assoc($pagination_array, 'max_area', $request->max_area);
        }
        if (isset($request->user_id)) {
            $search = $request->user_id;
            $properties = $global->searchRelation($properties, 'user', 'user_id', $search);
            $pagination_array = $this->array_push_assoc($pagination_array, 'user_id', $request->user_id);
        }


        $properties = $properties->orderBy('created_at', 'desc')->paginate(28)->setPath('');
        $properties->sortBy('priority');
        $pagination = $properties->appends($pagination_array);

        // dd($properties->links());
        return $properties;

        if ($request->view == 1) {
            return view('frontend2.property.featured', compact('properties'));
        }
        if ($request->view == 2) {
            return view('frontend2.property.list-item', compact('properties'));
        }
    }

    function array_push_assoc($array, $key, $value)
    {
        $array[$key] = $value;
        return $array;
    }
}
