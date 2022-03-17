<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Interface\ProjectRepositoryInterface;
// use Illuminate\Support\Facades\View;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $projectRepo ;
    public function __construct(projectRepositoryInterface $project)
    {
        $this->projectRepo = $project;
        $this->middleware('auth');
    }

    public function index()
    {
        // $projects = project::orderby('id','asc')->paginate();
        return view('project.index',['projects' => $this->projectRepo->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'p_name' => 'required',
            'company' => 'required',
            's_date' => 'required',
            'country' => 'required',
        ]);
        $fields = $request->all();
        $this->projectRepo->create($fields);
        
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        return view('project.show',['project'=>$this->projectRepo->find($project->id)]);
        // return view('project.show');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(project $project)
    {
        $project = $this->projectRepo->find($project->id);
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
        $this->projectRepo->update($project->id,$request);

        // $fields = $request->all();
        // $project = project::find($project->id);
        // $project->update($fields);
        // $project->save();
        return redirect()->route('project.index')->with('Success','Person details has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(project $project)
    {
        $this->projectRepo->delete($project->id);
        return redirect()->route('project.index')->with('Success','Person details has been deleted successfully');
    
    }
}