<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Company;
use App\Category;
use App\Favourite;
use App\JobUser;
use DB;
use Auth;
class JobController extends Controller
{
   

public function index(){
	 $jobs = Job::latest()->whereDate('last_date','>',Date('Y-m-d'))->limit(5)->get(); 
	  $categorys =Category::with('jobs')->get();
     $companys = Company::latest()->limit(10)->get(); 	
	return view('welcome',compact('jobs','companys','categorys'));
}



	public function alljobs(Request $request){
		if(empty($request->all())){
			   $jobs =Job::latest()->paginate(5);
          return view('jobs.all-jobs',compact('jobs'));
         }else{

            $jobs =DB::table('jobs')->Where('category_id','LIKE','%'.$request->category_id.'%')
                ->orWhere('address','LIKE','%'.$request->address.'%')
                 ->orWhere('type','LIKE','%'.$request->type.'%')
                ->orWhere('title','LIKE','%'.$request->title.'%')->latest()->paginate(5);
            $jobs->appends($request->all());
           return view('jobs.all-jobs',compact('jobs'));
        
        
    }
		 
}







	 public function jobdetail($slug){
    	$job= Job::where('slug',$slug)->first();
    	return view('jobs.job_details',compact('job'));
    }


	public function jobapply(Request $request,$id){
		 
        $jobId =Job::find($id);
        $jobcount =JobUser::where('job_id',$request->id)->where('user_id',Auth::user()->id)->count();
        if($jobcount>0){

        return redirect()->back()->with('flash_message_success','Job Already Applied');
        }else{

        $data= $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('flash_message_success','Job Applied Successfully');
        }
       
		}


		public function jobfavourite(Request $request,$id){

		$favcount =Favourite::where('job_id',$request->id)->where('user_id',Auth::user()->id)->count();
		if($favcount>0){
	return redirect()->back()->with('flash_message_success','Job Favourite Already Done');
		}else{
		$user_id =Auth::user()->id;
		$data = new Favourite();
		$data->user_id = $user_id ;
		$data->job_id = $request->job_id; 
		$data->save();
        return redirect()->back()->with('flash_message_success','Job Favourite Successfully');

        }

		}

















}
