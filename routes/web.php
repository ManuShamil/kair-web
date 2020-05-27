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

Route::get('/contact', 'PagesController@contact');
Route::post('/contact', 'PagesController@postMessage');

Route::get('/departments', 'PagesController@loadDepartments');

Route::get('/department/{department_name}', 'PagesController@getTreatments');

Route::get('/treatment/{treatment_id}', 'PagesController@getTreatment');

Route::get('/hospital/{hospital_id}', 'PagesController@getHospital');
Route::get('/hospitals', 'PagesController@getHospitals');

Route::get('/welcome', function () {
    return view('welcome');
});

/*
Route::get('/images/department/{file_name}', 'ImagesController@getDepartmentImages');
Route::get('/images/treatment/{file_name}', 'ImagesController@getTreatmentImage');
Route::get('/images/why/{file_name}', 'ImagesController@getWhyImages');
Route::get('/images/how/{file_name}', 'ImagesController@getHowImages');
Route::get('/images/testimonial/{file_name}', 'ImagesController@getTestimonialImages');*/


Route::get('/images/{image_id}', 'ImagesController@getImage');

Route::get('/admin/department/add', 'AdminPagesController@addDepartment');
Route::get('/admin/department/{department_id}/edit', 'AdminPagesController@editDepartment');
Route::post('/admin/department', 'AdminPagesController@postDepartment');
Route::put('/admin/department', 'AdminPagesController@updateDepartment');

Route::get('/admin/{department_id}/treatment/add', 'AdminPagesController@addTreatment');
Route::get('/admin/treatment/{treatment_id}/edit', 'AdminPagesController@editTreatment');
Route::post('/admin/{department_id}/treatment', 'AdminPagesController@postTreatment');
Route::put('/admin/treatment/{treatment_id}', 'AdminPagesController@updateTreatment');

Route::get('/admin/hospital/add', 'AdminPagesController@addHospital');
Route::post('/admin/hospital', 'AdminPagesController@postHospital');
Route::get('/admin/hospital/{hospital_id}/edit', 'AdminPagesController@editHospital');
Route::put('/admin/hospital/{hospital_id}', 'AdminPagesController@updateHospital');

Route::get('/admin/accreditation/add', 'AdminPagesController@addAccreditation');
Route::post('/admin/accreditation', 'AdminPagesController@postAccreditation');
Route::get('/admin/accreditation/{accreditation_id}/edit', 'AdminPagesController@editAccreditation');
Route::put('/admin/accreditation/{accreditation_id}', 'AdminPagesController@updateAccreditation');

Route::get('/admin/location/add', 'AdminPagesController@addLocation');
Route::post('/admin/location', 'AdminPagesController@postLocation');
Route::get('/admin/location/{location_id}/edit', 'AdminPagesController@editLocation');
Route::put('/admin/location/{location_id}', 'AdminPagesController@updateLocation');


Route::get('/admin/login', 'AdminPagesController@loginIn');
Route::get('/admin/logout', 'AdminPagesController@logOut');