<?php

namespace App\Http\Controllers\Customer;

use App\Agency;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\City;
use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyCollection;
use App\Property;
use App\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $devicecheck;

    public function __construct()
    {
        $this->devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'));
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $properties = Property::orderBy('created_at', 'desc')->where('status', 1)->paginate(25);
        $agencies = Agency::orderBy('id', 'asc')->where('status', 1)->paginate(5);
        $propertytypes = PropertyType::all();
        $areaones = AreaOne::all();
        $areatwos = AreaTwo::all();
        $areathrees = AreaThree::all();
        $city = City::all();


        return $this->devicecheck == 1
        ? view('frontend2mobile.home.index')
        : view('frontend2.home.index', compact('city', 'areaones', 'areatwos', 'areathrees', 'propertytypes', 'agencies'));


        // return view('frontend.customer.home',compact('city','areaones','areatwos','areathrees','propertytypes','agencies'));
    }


    public function searchBar(Request $request)
    {

        $agencies = Agency::orderBy('id', 'asc')->where('status', 1)->paginate(5);
        $propertytypes = PropertyType::all();
        $areaones = AreaOne::all();
        $areatwos = AreaTwo::all();
        $areathrees = AreaThree::all();
        $city = City::all();

        if ($request->view == 1) {
            return view('frontend2.property.searchbar', compact('city', 'areaones', 'areatwos', 'areathrees', 'propertytypes', 'agencies'));
        }

        if ($request->view == 2) {
            return view('frontend2.banners.propertybanner', compact('city', 'areaones', 'areatwos', 'areathrees', 'propertytypes', 'agencies'));
        }
    }

    public function onstartup(Request $request)
    {
        if ($request->onstartup == 'properties') {
            $properties = Property::orderBy('created_at', 'desc')->where('status', 1)->paginate(25);
            // $properties = view('frontend.customer.hometable.recentproperties', compact('properties'))->render();
            return response()->json([
                'properties' => $properties,
            ]);
        }
        if ($request->onstartup == 'featured') {
            $featured = Property::orderBy('created_at', 'asc')->where('status', 1)->where('priority', 3)->paginate(25);
            // $featured = view('frontend.customer.hometable.featuredproperties', compact('featured'))->render();
            return response()->json([
                'featured' => $featured,
            ]);
        }
        // return response()->json([
        //     'data' => $data,
        // ]);
        // return 2;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
