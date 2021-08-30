<?php

namespace App\Http\Controllers;


use App\Mail\SendJob;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use Mail;


class EmailController extends Controller
{
    



public function sendjob(Request $request){
        $homeUrl =url('/');
        $jobSlug =$request->get('job_slug');
        $jobUrl =$homeUrl.'/'.'jobs/'.$jobSlug;

        $data =array(
            'your_name'=>$request->get('your_name'),
            'your_email'=>$request->get('your_email'),
            'friend_name'=>$request->get('friend_name'),
            'friend_email'=>$request->get('friend_email'),
            'jobUrl'=>$jobUrl,
        );
        $emailTo =$request->get('friend_email');
        Mail::to($emailTo)->send(new SendJob($data));
        return redirect()->back()->with('flash_message_success','Your refer send successfully');

    }







}
