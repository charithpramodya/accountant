<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Files\FileController;

class ProjectController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:user');
    }

    public function createProject(Request $request){

    	$file=new FileController;

    	$this->validator($request->all())->validate();
    	$project=$this->create($request->all());

    	$result=$file->createProjectFolder($project->filenamehash);
    	return $result;
    }

    /**
    * create new project
    *@return Project instance
    **/

    protected function create(array $data)
    {
        return Project::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'userid'=>Auth::id(),
            'filenamehash'=>bcrypt(now())
            
        ]);
    }

    /**
    * Validate details
    *@return result
    **/

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'description' => 'max:500|string',
        ]);
    }

    public function showProjects(){
        $projects=Project::where('userid',Auth::id())->get();
        $data=array('projects'=>$projects);
    	return view('user.project.project',$data);
    }


}
