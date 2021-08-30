<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Auth;
use App\User;
use App\Category;
use App\Job;
use App\JobUser;
class CompanyController extends Controller
{
    

 	public function index($slug){
    	$company = Company::where('slug',$slug)->first();
    	return view('company.index',compact('company'));
    }


	public function companyprofile(){

	return view('company.company_profile');
	}



 public function cupdate(Request $request){
        $this->validate($request,[
            'address'=>'required',
            'phone'=>'required|min:10|numeric',
            'website'=>'required',
            'slogan'=>'required',
            'description'=>'required',
        ]);
        $user_id =auth()->user()->id;

        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);
        return redirect()->back()->with('flash_message_success','Your Company Profile Successfully Updated');

    }



     public function logo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:jpg,png,jpeg|max:1024',

        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){
            $file =$request->file('logo');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/logo',$fileName);
            Company::where('user_id',$user_id)->update([
                'logo' =>$fileName
            ]);
            return redirect()->back()->with('flash_message_success','Your Company Logo Upload Successfully');
        }

    }














	public function jobpost(){
		$categories = Category::all();
	return view('company.company_job_post',compact('categories'));
	}

	public function jobmanage(){
		$jobs =Job::where('user_id',Auth::user()->id)->get();

	return view('company.company_manage_job',compact('jobs'));
	}

	public function resume(){
		 $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        
		return view('company.company_resume',compact('applicants'));
	}




  public function jobsave(Request $request){
        $user_id =Auth::user()->id;
        $company =Company::where('user_id',$user_id)->first();
        $company_id =$company->id;
        Job::create([
            'user_id'=>$user_id,
            'company_id' =>$company_id,
            'title' =>request('title'),
            'slug' =>str_slug(request('title')),
            'roles' =>request('roles'),
            'description' =>request('description'),
            'category_id' =>request('category_id'),
            'position' =>request('position'),
            'address' =>request('address'),
            'type' =>request('type'),
            'status' =>request('status'),
             'salary' =>request('salary'),
            'last_date' =>request('last_date'),


        ]);

        return redirect()->route('company.jobmanage')->with('flash_message_success','Your Job Posted Successfully');
    }



	public function jobedit($id){
        $job = Job::findOrFail($id);
        $categories = Category::all();
		return view('company.job_edit',compact('categories','job'));
       
    }



      public function jobupdate(Request $request,$id){
        $this->validate($request,[
            'title' =>'required',
            'roles' =>'required',
            'description' =>'required',
            'position' =>'required',
            'address' =>'required',
            'status' =>'required',
            'last_date' =>'required',
        ]);

        $job =Job::findOrFail($id);
        $job->title =request('title');
        $job->roles =request('roles');
        $job->description =request('description');
        $job->category_id =request('category_id');
        $job->position =request('position');
        $job->address =request('address');
        $job->type =request('type');
        $job->status =request('status');
        $job->last_date =request('last_date');
        $job->save();
        return redirect()->route('company.jobmanage')->with('flash_message_success','Job Update Successfully');

    }















  public function jobdelete($id){
        $job =Job::findOrFail($id);
        $job->delete();
        return redirect()->back()->with('flash_message_success','Your Job Delete Successfully');

    }






	public function password(){

		return view('company.company_password_changce');
	}

	public function passwordupdate(Request $request){
		if(Auth::attempt(['id'=>Auth::user()->id,'password'=> $request->current_password])){
			$user = User::find(Auth::user()->id);
    		$user->password = bcrypt($request->new_password);
    		$user->save();
    		return redirect()->back()->with('flash_message_success','Password changed successfully');

		}else{
			return redirect()->back()->with('flash_message_success','Sorry! your current password does not match');
		}
		
	}


	

	







}
