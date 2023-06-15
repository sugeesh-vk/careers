<?php

namespace App\Http\Controllers;

use App\Models\applicants;
use Illuminate\Http\Request;

class ApplicantsController extends Controller
{
    
    public function save(Request $request)
    {
        
        // dd($request);
        // Validate the request data
      $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'number' => 'required',
            'file' => 'required|file|max:3000|mimes:pdf',
        ]);


        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('temp');
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            // return "File uploaded successfully!";
        }
        // dd($fileName);
    $task = new applicants;
    $task->name = $request->name;
    $task->email = $request->email;
    $task->job = $request->job;
    $task->phone = $request->number;
    $task->file = $fileName;
    $task->save();

toastr()->success(' Successfully Applied!', 'Congrats');
    return redirect()->back();
    }
}
