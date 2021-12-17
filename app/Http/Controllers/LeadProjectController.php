<?php

namespace App\Http\Controllers;

use App\AreaOne;
use App\AreaTwo;
use App\GlobalClass;
use App\Lead;
use App\LeadProject;
use App\Project;
use Illuminate\Http\Request;

class LeadProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $globalclass=new GlobalClass;
        if (!$request->keyword) {

            $leadProjects = LeadProject::orderBy('id','desc')->paginate(25);
            if(auth()->user()->role->name=='Project Owner'){
                // dd(auth()->user()->project->id);
                $leadProjects = LeadProject::where('project_id',auth()->user()->project->id)->orderBy('id','desc')->paginate(25);
            }
            else if(auth()->user()->role->name=='Project Lead Staff'){
                $leadProjects = LeadProject::where('project_id',auth()->user()->projectUser->project_id)->orderBy('id','desc');
                $leadProjects=$globalclass->searchRelation($leadProjects,'lead','created_by',auth()->user()->id)->paginate(25);
            }

        } else {

            $seacrh = $request->keyword;
            $leadProjects = LeadProject::where('id','!=',null)->orderBy('id','desc');

            $leadProjects = $leadProjects->whereHas('project', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('project', function ($query) use ($seacrh) {
                $query->whereHas('user', function ($query) use ($seacrh) {
                    $query->where('name', 'like', '%' . $seacrh . '%');
                });
            })->orWhereHas('project', function ($query) use ($seacrh) {
                $query->whereHas('user', function ($query) use ($seacrh) {
                    $query->where('phone', 'like', '%' . $seacrh . '%');
                });
            })->orWhereHas('lead', function ($query) use ($seacrh) {
                $query->where('name', 'like', '%' . $seacrh . '%');
            })->orWhereHas('lead', function ($query) use ($seacrh) {
                $query->where('phone', 'like', '%' . $seacrh . '%');
            })->paginate(25)->setPath('');

            $pagination = $leadProjects->appends(array(
                'keyword' => $request->keyword
            ));
        }

        $area_one =AreaOne::orderBy('created_at', 'desc');
        $area_two =AreaTwo::orderBy('created_at', 'desc');

        return view('admin.lead_project.index', compact(['leadProjects','area_one','area_two']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leads = Lead::all();
        return view('admin.lead_project.create', compact(['leads']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LeadProject::create([
            'project_id' => $request->project_id,
            'lead_id' => $request->lead_id,

        ]);
        return redirect()->route('leadprojects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeadProject  $leadProject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead_id = $id;
        $projects = Project::all();

        return view('admin.lead_project.create', compact(['lead_id', 'projects']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeadProject  $leadProject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lead_id = $id;
        $projects = Project::all();

        return view('admin.lead_project.edit', compact(['lead_id', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeadProject  $leadProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $leadProject = LeadProject::find($id);
        $leadProject->update($request->all());
        return redirect()->route('leadprojects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeadProject  $leadProject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $leadProject = LeadProject::find($id);
        $leadProject->delete();
        return redirect()->back();
    }

    public function filter(Request $request){





        $leadProjects = LeadProject::orderBy('created_at','desc');
        if (isset($request->start_date)) {
            $leadProjects = $leadProjects->whereBetween('created_at', [$request->start_date, $request->end_date]);

        }
        if (isset($request->lead_status)) {
            $leadProjects = $leadProjects->where('lead_status', $request->lead_status);
        }
        if (isset($request->call_status)) {
            $leadProjects = $leadProjects->where('call_status', $request->call_status);
        }
        if (isset($request->chat_status)) {
            $leadProjects = $leadProjects->where('chat_status', $request->chat_status);
        }


        $leadProjects = $leadProjects->paginate(25);

        $pagination = $leadProjects->appends(array(
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'lead_status' => $request->lead_status,
            'call_status' => $request->call_status,
            'chat_status' => $request->chat_status

        ));

        return view('admin.lead_project.index',compact('leadProjects'));
    }
}
