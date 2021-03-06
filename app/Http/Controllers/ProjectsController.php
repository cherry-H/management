<?php

namespace App\Http\Controllers;

use App\Projectuser;
use App\User;
use App\Project;
use App\Task;
use App\Credential;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ProjectsController extends BaseController
{
	// Get all user projects
	public function getAllUserProjects(){
		$projects = Project::where('user_id',Auth::id())->get();

		if($projects) {
			foreach ($projects as $project) {
				$completedWeight = Project::find($project->id)->tasks()->where('state','=','complete')->sum('weight');
				$totalWeight = Project::find($project->id)->tasks()->sum('weight');

				$project["completedWeight"] = $completedWeight;
				$project["totalWeight"] = $totalWeight;
			}
		}

		return $this->setStatusCode(200)->makeResponse('Projects retrieved successfully',$projects->toArray());
	}

    // Get all projects that the Auth user is a member of
	public function getAllMemberProjects(){
        $sharedProjects = Projectuser::where('user_id', Auth::id())->select('project_id')->get();
        $project_ids = [];

        foreach($sharedProjects as $project){
            $project_ids[] = $project->project_id;
        }

        $sharedProjects = Project::whereIn('id', $project_ids)->get();

        if($sharedProjects) {
            foreach ($sharedProjects as $project) {
                $completedWeight = Project::find($project->id)->tasks()->where('state','=','complete')->sum('weight');
                $totalWeight = Project::find($project->id)->tasks()->sum('weight');

                $project["completedWeight"] = $completedWeight;
                $project["totalWeight"] = $totalWeight;
            }
        }
        return $this->setStatusCode(200)->makeResponse('Projects retrieved successfully',$sharedProjects);
    }

	//	Return the given project
	public function getProject($id){
		if (!Project::find($id)) {
			return $this->setStatusCode(404)->makeResponse('The project was not found');
		}

		$project = Project::find($id);
		$project->tasks = Task::where('project_id', $id)->get();
		$project->credentials = Credential::where('project_id', $id)->get();

		return $this->setStatusCode(200)->makeResponse('Project was successfully found', $project);
	}

	// Insert the given project into the database
	public function storeProject(){
		if (!Input::all() || strlen(trim(Input::get('name'))) == 0) {
			return $this->setStatusCode(406)->makeResponse('No information provided to create project');
		}

		Input::merge(array('user_id' => Auth::id()));
		Project::create(Input::all());
		$id = \DB::getPdo()->lastInsertId();

		return $this->setStatusCode(200)->makeResponse('Project created successfully', Project::find($id));
	}

    //delete this given project into the database
    public function deleteProject($id)
    {
        if (Input::get($id) === "") {
            return $this->setStatusCode(406)->makeResponse('The project id is null');
        }echo 1;

        if (!Project::find($id)) {
            return  $this->setStatusCode(404)->makeResponse('Could not find the project');
        }

        // delete all related tasks and credentials
        Task::where('project_id', $id)->delete();
        Credential::where('project_id', $id)->delete();
        Projectuser::where('project_id', $id)->delete();

        // delete projects
        Project::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('The project has been deleted');
    }

    //delete this given project into the database
    public function deleteProjectByName($id)
    {
        if (Input::get($id) === "") {
            return $this->setStatusCode(406)->makeResponse('The project id is null');
        }echo 1;

        if (!Project::find($id)) {
            return  $this->setStatusCode(404)->makeResponse('Could not find the project');
        }

        // delete all related tasks and credentials
        Task::where('project_id', $id)->delete();
        Credential::where('project_id', $id)->delete();
        Projectuser::where('project_id', $id)->delete();

        // delete projects
        Project::find($id)->delete();
        return $this->setStatusCode(200)->makeResponse('Project deleted successfully', $id);
    }

	// Update the given project
	public function updateProject($id){
		if ( Input::get('name') === "") {
			return $this->setStatusCode(406)->makeResponse('The project needs a name');
		}

		if (!Project::find($id)) {
			return $this->setStatusCode(404)->makeResponse('Project not found');
		}

		$input = Input::all();
		unset($input['_method']);

		Project::find($id)->update($input);
		return $this->setStatusCode(200)->makeResponse('The project has been updated');
	}

    // Returns the given project view
    public function show($id)
    {
        $project 		=	Project::find($id);

        // Must be refactored as a filter
        if ( $project->isOwner() == false && $project->isMember() == false ) {
            return Redirect::to('/hud');
        }

        return  View::make('ins/projects/show')->with('pTitle', $project->name);
    }

    public function getOwner($id){
        $owner_id = Project::whereId($id)->pluck('user_id');
        $owner = User::whereId($owner_id)->get();

        return $this->setStatusCode(200)->makeResponse('ok.', $owner[0]);
    }

    public function getMembers($id){
        $members_id = Projectuser::where('project_id', $id)->lists('user_id');
        $members = [];

        foreach($members_id as $id){
            $member = User::whereId($id)->get();
            array_push($members, $member[0]);
        }

        return $this->setStatusCode(200)->makeResponse('ok.', $members);
    }

    // Invites a user to the given project.
	public function invite($project_id, $email){
        if(trim(strlen($email)) == 0){//trim移除字符串两侧的空白字符或其他预定义字符
            return $this->setStatusCode(406)->makeResponse('The email field is required!');
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->setStatusCode(406)->makeResponse('Please enter a valid email!');
        }//filter_vat(过滤的变量，过滤器ID)通过指定过滤器过滤变量,FILTER_VALIDATE_EMAIL把值作为电子邮箱地址验证

        $project_name	= Project::whereId($project_id)->pluck('name');
        //$project_name	= Project::find($project_id)->where(['user_id' => Auth::id()])->pluck('name');
        $owner_id	    = Project::find($project_id)->pluck('user_id');
        $project_url 	= url() . '/projects/'.$project_id;
        $invited_user   = User::whereEmail($email)->get();

        if( count($invited_user) == 0 ){
            return $this->setStatusCode(406)->makeResponse('That user does not have an account.');
        }
        $invited_user = $invited_user[0];

        if( count(Projectuser::whereUserId($invited_user->id)->whereProjectId($project_id)->get()) != 0 ){
			return $this->setStatusCode(406)->makeResponse('A user with that email has already been invited.');
		}

        if(Helpers::isOwner($project_id) != $owner_id){
            return $this->setStatusCode(406)->makeResponse('Only the project owner can invite a user.');
        }
		// Save the relationship between user and project.
		$pu				= 	new Projectuser();
		$pu->project_id	=	$project_id;
		$pu->user_id	=	$invited_user->id;
		$pu->save();

		Helpers::sendProjectInviteMail($email, $project_name, $project_url);
		return $this->setStatusCode(200)->makeResponse('A new member has been added to this project.', $invited_user);
	}

    // Removes a member from a given project
	public function removeMember($project_id, $member_id){
		if( count(Projectuser::whereUserId($member_id)->whereProjectId($project_id)->get()) == 0 ){
			return $this->setStatusCode(406)->makeResponse('That user is not in this project.');
		}

		$project = Project::find($project_id);
		$project->members()->detach($member_id);

		return $this->setStatusCode(200)->makeResponse('Member has been removed from this project.');
	}

	//excel文件导出功能
    public function export($id)
    {
        $header      = ['Name', 'Username', 'Password', 'Hostname', 'Port'];
        $fileName    = 'Credientials表格';
        $credentials = Credential::select('name', "username", "password", "hostname", "port")->where('project_id', $id)->get()->toArray();

        array_unshift($credentials, $header);//array_unshift 在数组开头插入一个或多个单元
        Excel::create($fileName, function ($excel) use ($credentials) {
            $excel->sheet('sheet1', function ($sheet) use ($credentials) {
                $sheet->rows($credentials);
            });
        })->export('xls');
    }

    public function import()
    {

    }
}