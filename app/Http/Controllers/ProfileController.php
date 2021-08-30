<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Favourite;

use App\Job;
use App\JobUser;
use App\User;
use Auth;
use DB;
class ProfileController extends Controller
{
   

public function candidateprofile(){
    $user_id = auth()->user()->id;
  
	return view('candidate.profile');
}


public function candidateprofilestore(Request $request){


        $user_id =auth()->user()->id;
       Profile::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phone'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
            'cover_letter'=>request('cover_letter'),
        ]);

	
	 	
    return redirect()->back()->with('flash_message_success','Your Profile Successfully Updated');
}


 public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:jpg,png,jpeg|max:1024',

        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file =$request->file('avatar');
            $text =$file->getClientOriginalExtension();
            $fileName =time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
            Profile::where('user_id',$user_id)->update([
                'avatar' =>$fileName
                ]);
            return redirect()->back()->with('flash_message_success','Your Photo Upload Successfully');
        }

    }










public function candidateresume(){
	return view('candidate.jobs-my-resume');
}


  public function resumestore(Request $request){
        $this->validate($request,[
            'resume'=>'required|mimes:pdf,doc,docx|max:20000',

        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')
            ->store('public/files');
        Profile::where('user_id',$user_id)->update([
            'resume' =>$resume
            ]);
        return redirect()->back()->with('flash_message_success','Your Resume Upload Successfully');
    }



        public function password(){
            return view('candidate.change-password');
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




     
    public function myjob(){
        $myjobs =JobUser::where('user_id', auth()->user()->id)->get();

        return view('candidate.my-job',compact('myjobs'));
        //return response()->json($saves);
    }


     public function favourite(){
        $saves =Favourite::where('user_id', auth()->user()->id)->get();          
        return view('candidate.save-job',compact('saves'));
        //return response()->json($saves);
    }

    public function jobfavdelete($id){
        $delete = Favourite::find($id);
        $delete->delete();
        return redirect()->back()->with('flash_message_success','job Delete Successfully');
    }



  


    


}
