<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobUser extends Model
{
   public function jobs(){
        return $this->belongsTo(Job::class,'job_id','id'); 
    }
}
