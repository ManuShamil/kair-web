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

Route::get('/', 'PagesController@index');

Route::get('/why', 'PagesController@why');

Route::get('/how', 'PagesController@how');

Route::get('/departments', 'PagesController@loadDepartments');

Route::get('/treatments/{department_id}', 'PagesController@getTreatments');

Route::get('/{department_name}/{treatment_id}', 'PagesController@getTreatment');

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/images/department/{file_name}', 'ImagesController@getDepartmentImages');
Route::get('/images/treatment/{file_name}', 'ImagesController@getTreatmentImage');
Route::get('/images/why/{file_name}', 'ImagesController@getWhyImages');
Route::get('/images/how/{file_name}', 'ImagesController@getHowImages');
Route::get('/images/testimonial/{file_name}', 'ImagesController@getTestimonialImages');

Route::get('/admin/departments', 'AdminPagesController@departments');
