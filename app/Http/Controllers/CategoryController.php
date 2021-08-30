<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Job;
class CategoryController extends Controller
{
   


 	public function cagetory($id){
        $jobs =Job::where('category_id',$id)->paginate(10);
        $categoryName =Category::where('id',$id)->first();
        return view('jobs.job-category',compact('jobs','categoryName'));


    }



}
