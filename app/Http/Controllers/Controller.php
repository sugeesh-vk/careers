<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\applicants;
use App\Models\careers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){

        $careers = careers::all();
        return view('website.index', ['careers' => $careers]);
    }
    public function search(Request $request)
    {
        $searchTerm = $request->name;
        $careers = careers::where('name', 'like', "%{$searchTerm}%")
        ->orWhere('job_title', 'like', "%{$searchTerm}%")
        ->orWhere('job_type', 'like', "%{$searchTerm}%")
        ->orWhere('location', 'like', "%{$searchTerm}%")
                        ->get();

        return view('website.searchjobs', compact('careers'));
    }
    public function search_jobs(Request $request){
        return view('website.searchjobs', ['careers' => $careers]);
    }
    public function jobsview(Request $request,$id){

        // $applicant = applicants::find('job_title',$id);
        $applicant = applicants::where('job',$id)->get();
        // dd($id);
        return view('website.applican', ['applicants' => $applicant]);
    }
    public function deleteapplicant(Request $request,$id){
        $applicant = applicants::where('id',$id)->delete();
        toastr()->success(' Successfully Deleted!', 'Congrats');
        return redirect()->back();
    }
}
