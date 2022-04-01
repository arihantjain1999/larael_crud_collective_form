<?php

namespace App\Repositories;
use App\Models\Project;
use App\Interface\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface 
{
    public function all(){
        $project = Project::all();
        return $project;
    }
    public function find($id){
        $project = Project::find($id);
        return $project;
    }
    public function update($id,$request){
        $fields = $request->all();
        $project = Project::find($id);
        $project->update($fields);
       
        return redirect()->route('project.index')->with('Success','Person details has been updated successfully');
  
    }
    public function delete($id){
        return Project::find($id)->delete();
    }
    public function create($data){
     
       $data =  Project::create($data);
        return $data ;
    }
}