<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\careers;

class AdminController extends Controller
{
    public function createcareers(Request $request){
        return view('website.create_careers');
    }
    public function save(Request $request){
        
        // Validate the request data
      $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'location' => 'required',
            'jobtitle' => 'required',
            'jobdescription' => 'required',
            'type' => 'required',
        ]);

        // Create a new user record
    $task = new careers;
    $task->name = $request->name;
    $task->email = $request->email;
    $task->phone = $request->phone;
    $task->location = $request->location;
    $task->job_title = $request->jobtitle;
    $task->job_description = $request->jobdescription;
    $task->job_type = $request->type;
    $task->save();
    toastr()->success(' Successfully Daved!', 'Congrats');
    return redirect()->back();
    }
}
