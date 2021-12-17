<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Lead;
use App\LeadProject;
use App\LeadProperty;
use App\Property;
use App\User;
use Illuminate\Http\Request;

class LeadPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(auth()->user()->role->name == 'Agents'){
            // dd(auth()->user()->id);
            $leadProperties = LeadProperty::where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(25);
        }

        if(auth()->user()->role->name == 'Agency'){
            // dd(auth()->user()->agency->id);
            $agents =Agent::where('agency_id' ,auth()->user()->agency->id)->get();
            // dd($agents[0]->user_id);
            $leadProperties = LeadProperty::whereIn('user_id',$agents)->orderBy('created_at','desc')->paginate(25);

        }
            elseif(auth()->user()->role->name != 'Agency' && auth()->user()->role->name != 'Agents'){
                $leadProperties = LeadProperty::orderBy('created_at','desc')->paginate(25);
            }

        // if (!$request->keyword) {

        //     $leadProperties = LeadProperty::orderBy('created_at','desc')->paginate(25);
        // } else {

        //     $seacrh = $request->keyword;
        //     $leadProperties = LeadProperty::where('id','!=',null)->orderBy('created_at','desc');

        //     $leadProperties = $leadProperties->whereHas('property', function ($query) use ($seacrh) {
        //         $query->where('category', 'like', '%' . $seacrh . '%');
        //     })->orWhereHas('property', function ($query) use ($seacrh) {
        //         $query->whereHas('areaOne', function ($query) use ($seacrh) {
        //             $query->where('name', 'like', '%' . $seacrh . '%');
        //         });
        //     })->orWhereHas('property', function ($query) use ($seacrh) {
        //         $query->whereHas('areaTwo', function ($query) use ($seacrh) {
        //             $query->where('name', 'like', '%' . $seacrh . '%');
        //         });
        //     })->orWhereHas('property', function ($query) use ($seacrh) {
        //         $query->whereHas('user', function ($query) use ($seacrh) {
        //             $query->where('phone', 'like', '%' . $seacrh . '%');
        //         });
        //     })->orWhereHas('property', function ($query) use ($seacrh) {
        //         $query->where('size', 'like', '%' . $seacrh . '%');
        //     })->orWhereHas('lead', function ($query) use ($seacrh) {
        //         $query->where('name', 'like', '%' . $seacrh . '%');
        //     })->orWhereHas('lead', function ($query) use ($seacrh) {
        //         $query->where('phone', 'like', '%' . $seacrh . '%');
        //     })->paginate(25)->setPath('');

        //     $pagination = $leadProperties->appends(array(
        //         'keyword' => $request->keyword
        //     ));
        // }


        return view('admin.lead_property.index', compact(['leadProperties']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leads = Lead::all();
        $properties=Property::all();
        $users = User::all();

        return view('admin.lead_property.create', compact('leads','properties','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead=Lead::create($request->all());
        // dd($lead->id);
        LeadProperty::create($request->all()+['lead_id'=>$lead->id]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeadProperty  $leadProperty
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead_id = $id;
        $properties= Property::all();

        return view('admin.lead_property.create', compact(['lead_id','properties']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeadProperty  $leadProperty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead_id = $id;
        $properties= Property::all();

        return view('admin.lead_property.edit', compact(['lead_id','properties']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeadProperty  $leadProperty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leadProperty = LeadProperty::find($id);
        $leadProperty->update($request->all());
        return redirect()->route('leadproperties.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeadProperty  $leadProperty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadProperty=LeadProperty::find($id);
        $leadProperty->delete();
        return redirect()->back();
    }
}
