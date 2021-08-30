<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    


    protected $guarded=[''];


 	public function jobs(){
        return $this->belongsTo(Job::class,'job_id','id'); 
    }





}
