<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
   

	protected $guarded =[];

  
    public function company(){
        return $this->belongsTo('App\Company'); //One To many Inverse
    }


     public function users(){
        return $this->belongsToMany(User::class,'job_users','job_id','user_id')->withTimestamps();
    }

 

 	
   public function checkApplication(){
        return \DB::table('job_user')->where('user_id',auth()->user()->id)
            ->where('job_id', $this->id)->exists();
    }









}
