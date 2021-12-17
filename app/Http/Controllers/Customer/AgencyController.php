<?php

namespace App\Http\Controllers\Customer;

use App\Agency;
use App\Agent;
use App\AreaOne;
use App\AreaThree;
use App\AreaTwo;
use App\GlobalClass;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $globalclass;
    public $devicecheck;

    public function __construct()
    {
        $this->globalclass = new GlobalClass;
        $this->devicecheck = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile'));
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {

            if ($request->keyword == null || $request->keyword == ' ') {
                $agencies = Agency::paginate(24);
            } else {

                $seacrh = $request->keyword;
                $agencies = Agency::where('id', '!=', null);
                $agencies = $agencies->whereHas('user', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                })->orWhereHas('areaOne', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                })->orWhereHas('areaTwo', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                })->orWhereHas('user', function ($query) use ($seacrh) {
                    $query->where('phone', $seacrh);
                })->orWhere('name', 'like', '%' . $seacrh . '%')
                    ->paginate(24)->setPath('');

                $pagination = $agencies->appends(array(
                    'keyword' => $request->keyword
                ));
            }

            if ($request->view == 1) {
                return view('frontend2.agency.featured', compact('agencies'));
            }
            if ($request->view == 2) {
                return view('frontend2.agency.list-item', compact('agencies'));
            }
        }
        if ($this->devicecheck == 1) {
            $agencies = Agency::take(4)->get();
        }
        return $this->devicecheck == 1
            ? view('frontend2mobile.agency.index', compact('agencies'))
            : view('frontend2.home.agencies');
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies = Agency::all();
        $users = User::all();
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();
        $area_three = AreaThree::all();
        return view('admin.agency.create', compact(['agencies', 'users', 'area_one', 'area_two', 'area_three']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        if ($request->file('image')) {
            $filename = $this->globalclass->storeS3($request->file('image'), 'agencies');
        }
        Agency::create($request->except('image') + ["image" => $filename]);
        return redirect()->route('agencies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        return $this->devicecheck == 1
            ? view('frontend2mobile.agency.single', compact('agency'))
            : view('frontend2.agency.single', compact('agency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::find($id);
        $users = User::all();
        $area_three = AreaThree::all();
        $area_two = AreaTwo::all();
        $area_one = AreaOne::all();


        return view("admin.agency.edit", compact(['agency', 'users', 'area_three', 'area_two', 'area_one']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::find($id);
        if ($request->file('image')) {
            $filename = $this->globalclass->storeS3($request->file('image'), 'agencies');
            $agency->update($request->except('image') + ["image" => $filename]);
        } else {
            $agency->update($request->all());
        }

        return redirect()->route('agencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agency  $agency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Agency::find($id);
        // $item->delete();
        return redirect()->back();
    }

    public function getSubCategory($category_id)
    {
        $area_two = AreaTwo::where('area_one_id', $category_id)->get();
        // Log::info($data);
        // dd($area_two);
        return response()->json(['data' => $area_two]);
    }
    public function getSubSubCategory($category_id)
    {
        $area_three = AreaThree::where('area_two_id', $category_id)->get();
        return response()->json(['data' => $area_three]);
    }

    public function filter(Request $request)
    {


        $agencies = Agency::orderBy('created_at', 'desc')->paginate(25);
        $area_one = AreaOne::all();
        $area_two = AreaTwo::all();

        $area_one = AreaOne::orderBy('created_at', 'desc');
        $area_two = AreaTwo::orderBy('created_at', 'desc');
        $agencies = Agency::orderBy('created_at', 'desc');

        if ($request->created_at  == "ascending") {
            $agencies = Agency::orderBy('created_at', 'asc');
        }

        if ($request->created_at == "descending") {
            $agencies = Agency::orderBy('created_at', 'desc');
        }

        if ($request->updated_at  == "ascending") {
            $agencies = Agency::orderBy('updated_at', 'asc');
        }

        if ($request->updated_at == "descending") {
            $agencies = Agency::orderBy('updated_at', 'desc');
        }
        if (isset($request->status)) {
            $agencies = $agencies->where('agencies.status', $request->status);
        }
        if (isset($request->verified)) {
            $agencies = $agencies->where('agencies.verified', $request->verified);
        }

        if (isset($request->area_one_id)) {
            $agencies = $agencies->where('agencies.area_one_id', $request->area_one_id);
        }
        if (isset($request->area_two_id)) {
            $agencies = $agencies->where('agencies.area_two_id', $request->area_two_id);
        }




        $agencies = $agencies->paginate(25);
        $area_one = $area_one->paginate(25);
        $area_two = $area_two->paginate(25);

        $pagination = $agencies->appends(array(
            'status' => $request->status,
            'verified' => $request->verified,
            'area_two_id' => $request->area_two_id,
            'area_one_id' => $request->area_one_id,
            'created_at' => $request->created_at,
            'updated_at' => $request->updated_at,

        ));

        return view('admin.agency.index', compact('agencies', 'area_one', 'area_two'));
    }
}
