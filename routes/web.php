<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckAdmin;

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
Route::post('/callback', 'PagesController@postCallback');

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

Route::get('/admin/department/add', 'AdminPagesController@addDepartment')->middleware(CheckAdmin::class);
Route::get('/admin/department/{department_id}/edit', 'AdminPagesController@editDepartment')->middleware(CheckAdmin::class);
Route::post('/admin/department', 'AdminPagesController@postDepartment')->middleware(CheckAdmin::class);
Route::put('/admin/department', 'AdminPagesController@updateDepartment')->middleware(CheckAdmin::class);
Route::delete('/admin/department', 'AdminPagesController@deleteDepartment')->middleware(CheckAdmin::class);

Route::get('/admin/{department_id}/treatment/add', 'AdminPagesController@addTreatment')->middleware(CheckAdmin::class);
Route::get('/admin/treatment/{treatment_id}/edit', 'AdminPagesController@editTreatment')->middleware(CheckAdmin::class);
Route::post('/admin/{department_id}/treatment', 'AdminPagesController@postTreatment')->middleware(CheckAdmin::class);
Route::put('/admin/treatment/{treatment_id}', 'AdminPagesController@updateTreatment')->middleware(CheckAdmin::class);
Route::delete('/admin/treatment/{treatment_id}', 'AdminPagesController@deleteTreatment')->middleware(CheckAdmin::class);

Route::get('/admin/hospital/add', 'AdminPagesController@addHospital')->middleware(CheckAdmin::class);
Route::post('/admin/hospital', 'AdminPagesController@postHospital')->middleware(CheckAdmin::class);
Route::get('/admin/hospital/{hospital_id}/edit', 'AdminPagesController@editHospital')->middleware(CheckAdmin::class);
Route::put('/admin/hospital/{hospital_id}', 'AdminPagesController@updateHospital')->middleware(CheckAdmin::class);
Route::delete('/admin/hospital/{hospital_id}', 'AdminPagesController@deleteHospital')->middleware(CheckAdmin::class);

Route::get('/admin/accreditation/add', 'AdminPagesController@addAccreditation')->middleware(CheckAdmin::class);
Route::post('/admin/accreditation', 'AdminPagesController@postAccreditation')->middleware(CheckAdmin::class);
Route::get('/admin/accreditation/{accreditation_id}/edit', 'AdminPagesController@editAccreditation')->middleware(CheckAdmin::class);
Route::put('/admin/accreditation/{accreditation_id}', 'AdminPagesController@updateAccreditation')->middleware(CheckAdmin::class);

Route::get('/admin/location/add', 'AdminPagesController@addLocation')->middleware(CheckAdmin::class);
Route::post('/admin/location', 'AdminPagesController@postLocation')->middleware(CheckAdmin::class);
Route::get('/admin/location/{location_id}/edit', 'AdminPagesController@editLocation')->middleware(CheckAdmin::class);
Route::put('/admin/location/{location_id}', 'AdminPagesController@updateLocation')->middleware(CheckAdmin::class);

Route::get('/admin/how/add', 'AdminPagesController@addHow')->middleware(CheckAdmin::class);
Route::post('/admin/how', 'AdminPagesController@postHow')->middleware(CheckAdmin::class);
Route::get('/admin/how/{how_id}/edit', 'AdminPagesController@editHow')->middleware(CheckAdmin::class);
Route::put('/admin/how/{how_id}', 'AdminPagesController@updateHow')->middleware(CheckAdmin::class);
Route::delete('/admin/how/{how_id}', 'AdminPagesController@deleteHow')->middleware(CheckAdmin::class);

Route::get('/admin/why/add', 'AdminPagesController@addWhy')->middleware(CheckAdmin::class);
Route::post('/admin/why', 'AdminPagesController@postWhy')->middleware(CheckAdmin::class);
Route::get('/admin/why/{why_id}/edit', 'AdminPagesController@editWhy')->middleware(CheckAdmin::class);
Route::put('/admin/why/{why_id}', 'AdminPagesController@updateWhy')->middleware(CheckAdmin::class);
Route::delete('/admin/why/{why_id}', 'AdminPagesController@deleteWhy')->middleware(CheckAdmin::class);

Route::get('/admin/testimonial/add', 'AdminPagesController@addTestimonial')->middleware(CheckAdmin::class);
Route::post('/admin/testimonial', 'AdminPagesController@postTestimonial')->middleware(CheckAdmin::class);
Route::get('/admin/testimonial/{testimonial_id}/edit', 'AdminPagesController@editTestimonial')->middleware(CheckAdmin::class);
Route::put('/admin/testimonial/{testimonial_id}', 'AdminPagesController@updateTestimonial')->middleware(CheckAdmin::class);
Route::delete('/admin/testimonial/{testimonial_id}', 'AdminPagesController@deleteTestimonial')->middleware(CheckAdmin::class);

Route::get('/admin/login', 'AdminPagesController@getLogin');
Route::post('/admin/login', 'AdminPagesController@loginIn');
Route::get('/admin/logout', 'AdminPagesController@logOut');