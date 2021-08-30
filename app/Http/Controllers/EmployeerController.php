<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use Hash;
class EmployeerController extends Controller
{
    

public function employeerregister(){
	return view('employee.employee_register');
}



public function employeerregisterstore(Request $request){
	$user = User::create([
            'name' => request('cname'),
            'email' => request('email'),
            'user_type'=> request('user_type'),
            'password' => Hash::make(request('password')),
        ]);
        Company::create(
            ['user_id'=>$user->id,
              'cname' => request('cname'),
              'slug' => str_slug(request('cname')),
        ]);
        return redirect()->to('login');
           
}










}
