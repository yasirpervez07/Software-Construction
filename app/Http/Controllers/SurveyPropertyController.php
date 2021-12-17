<?php

namespace App\Http\Controllers;

use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\GlobalClass;
use App\Property;
use App\PropertyFor;
use App\PropertyImage;
use App\PropertyType;
use App\SurveyProperty;
use App\User;
use Illuminate\Http\Request;

class SurveyPropertyController extends Controller
{
    public $globalclass;
    public function __construct()
    {
        $this->middleware(function (Request $request, $next) {
            if(auth()->user()->payment==null){
                return redirect()->route('upgrade');
            }

            return $next($request);
        });
        $this->globalclass = new GlobalClass;
    }

    public function search(Request $request)
    {
        $str = explode(',', $request->search_areas);
        $area = $str[0];
        $area_id = $str[1];

        $surveyproperties = SurveyProperty::where($area, $area_id)->paginate(25)->setPath('');
        $pagination = $surveyproperties->appends(array(
            'search_areas' => $request->search_areas
        ));

        return response()->json([
            'data' => $surveyproperties
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (!$request->keyword) {

            $surveyproperties = SurveyProperty::orderBy('created_at', 'desc')->paginate(25);
        } else {

            $seacrh = $request->keyword;
            $surveyproperties = SurveyProperty::where('id', '!=', null)->orderBy('created_at', 'desc');

            $surveyproperties = $surveyproperties->whereHas('user', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('user', function ($query) use ($seacrh) {
                $query->whereHas('agent', function ($query) use ($seacrh) {
                    $query->whereHas('agency', function ($query) use ($seacrh) {
                        $query->where('name', 'like', '%' . $seacrh . '%');
                    });
                });
            })->orWhereHas('areaOne', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('areaTwo', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('areaThree', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhere('name', 'like', '%' . $seacrh . '%')
                ->orWhere('type', 'like', '%' . $seacrh . '%')
                ->orWhere('id',$seacrh)
                ->orWhere('description', 'like', '%' . $seacrh . '%')
                ->paginate(25)->setPath('');

            $pagination = $surveyproperties->appends(array(
                'keyword' => $request->keyword
            ));
        }
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();

        return view('admin.surveyproperty.index', compact('surveyproperties', 'area_one', 'area_two'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();
        $area_three = AreaThree::all();
        $propertyfor = PropertyFor::all();
        $propertytype = PropertyType::all();
        return view('admin.surveyproperty.create', compact(['users', 'area_one', 'area_two', 'area_three', 'propertyfor', 'propertytype']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property = SurveyProperty::create($request->except('images'));

        if ($request->images != null) {
            $this->globalclass->storeMultipleS3($request->file('images'), 'surveyproperties', $property->id);
        }
        return redirect()->route('surveyproperties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('admin.surveyproperty_image.edit', compact('property'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $property = SurveyProperty::find($id);
        $users = User::all();
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();
        $area_three = AreaThree::all();
        $propertyfor = PropertyFor::all();

        return view('admin.surveyproperty.edit', compact(['property', 'users', 'area_one', 'area_two', 'area_three', 'propertyfor']));
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
        $property = SurveyProperty::find($id);
        $property->update($request->all());
        return redirect()->route('surveyproperties.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = SurveyProperty::find($id);
        $property->delete();
        return redirect()->back();
    }
    public function filter(Request $request)
    {


        $surveyproperties = SurveyProperty::orderBy('created_at', 'desc')->paginate(25);
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();

        $area_one = AreaOne::orderBy('created_at', 'desc');
        $area_two = AreaTwo::orderBy('created_at', 'desc');
        $surveyproperties = SurveyProperty::orderBy('created_at', 'desc');

        if (isset($request->type)) {
            $surveyproperties = $surveyproperties->where('surveyproperties.type', $request->type);
        }
        if (isset($request->description)) {
            $surveyproperties = $surveyproperties->where('surveyproperties.description', $request->description);
        }

        if (isset($request->area_one_id)) {
            $surveyproperties = $surveyproperties->where('surveyproperties.area_one_id', $request->area_one_id);
        }
        if (isset($request->area_two_id)) {
            $surveyproperties = $surveyproperties->where('surveyproperties.area_two_id', $request->area_two_id);
        }


        $surveyproperties = $surveyproperties->paginate(25);
        $area_one = $area_one->paginate(25);
        $area_two = $area_two->paginate(25);

        $pagination = $surveyproperties->appends(array(
            'type' => $request->type,
            'description' => $request->description,
            'area_two_id' => $request->area_two_id,
            'area_one_id' => $request->area_one_id,
        ));

        return view('admin.surveyproperty.index', compact('surveyproperties', 'area_one', 'area_two'));
    }
}
