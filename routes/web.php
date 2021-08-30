<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/////Job pages
Route::get('/', 'JobController@index');
Route::get('/jobs/{slug}', 'JobController@jobdetail')->name('job.detail');
Route::get('/all/jobs/', 'JobController@alljobs')->name('job.all');
Route::get('/search/job', 'JobController@alljobs')->name('search.job');
Route::get('/company/{slug}', 'CompanyController@index')->name('company.index');
Route::get('/cagetory/{id}', 'CategoryController@cagetory')->name('cagetory.job');
Route::post('/email/job','EmailController@sendjob')->name('job.mail');
////Employeer
Route::get('/employeer-register', 'EmployeerController@employeerregister')->name('employeer.register');
Route::post('/employeer-register-store', 'EmployeerController@employeerregisterstore')->name('employeer.register.store');


Route::middleware(['auth'])->group(function(){
  //company page
Route::get('/company-profile', 'CompanyController@companyprofile')->name('company.profile');
Route::post('/company-profile/update', 'CompanyController@cupdate')->name('company.profile.update');
Route::post('/company-profile/logo', 'CompanyController@logo')->name('company.logo');

Route::get('/company/job/post', 'CompanyController@jobpost')->name('company.jobpost');
Route::post('/company/job/save', 'CompanyController@jobsave')->name('company.jobsave');
Route::get('/company/job/edit/{id}', 'CompanyController@jobedit')->name('company.jobedit');
Route::post('/company/job/update/{id}', 'CompanyController@jobupdate')->name('company.jobupdate');
Route::get('/company/job/delete/{id}', 'CompanyController@jobdelete')->name('company.jobdelete');
Route::get('/company/job/manage', 'CompanyController@jobmanage')->name('company.jobmanage');
Route::get('/company/job/resume', 'CompanyController@resume')->name('company.resume');
Route::get('/company/change/password', 'CompanyController@password')->name('company.password');
Route::post('/company/change/password/update', 'CompanyController@passwordupdate')->name('company.password.update');

});




Route::middleware(['auth'])->group(function(){
////Candidate
Route::get('/candidate-profile', 'ProfileController@candidateprofile')->name('candidate.profile');
Route::post('/candidate-avatar', 'ProfileController@avatar')->name('candidate.avatar');
Route::post('/candidate-profile-store', 'ProfileController@candidateprofilestore')->name('candidate.profile.update');
Route::get('/candidate-resume', 'ProfileController@candidateresume')->name('candidate.resume');
Route::post('/candidate-resume-store', 'ProfileController@resumestore')->name('candidate.resume.store');
Route::get('/candidate-password', 'ProfileController@password')->name('candidate.password');
Route::post('/candidate-password-update', 'ProfileController@passwordupdate')->name('candidate.password.update');

Route::post('/job/apply/{id}', 'JobController@jobapply')->name('job.apply');
Route::get('/my/job', 'ProfileController@myjob')->name('my.job');
Route::get('/job/favourite', 'ProfileController@favourite')->name('job.favourite.candidate');
Route::post('/job/favourite/{id}', 'JobController@jobfavourite')->name('job.favourite');
Route::get('/job/favourite/delete/{id}', 'ProfileController@jobfavdelete')->name('job.favourite.delete');

});







