<?php

use Illuminate\Support\Facades\Route;

/* HOME */

route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

/* Terms */
route::get('/terms', ['as' => 'site.terms', 'uses' => 'Site\TermsController@index']);

/** BEGIN PERSON FREE ROUTE **/
route::get('/missing-person/show/{id}', ['as' => 'user.person.show', 'uses' => 'Site\PersonController@show']);
route::get('/missing-vehicle/show/{id}', ['as' => 'user.vehicle.show', 'uses' => 'Site\VehicleController@show']);
Route::post('visitor-store', ['as' => 'visitor.user.store', 'uses' => 'Visitor\UserController@store']);
route::get('/missing-people/search', ['as' => 'site.home.search', 'uses' => 'Site\HomeController@search']);
/** END PERSON ROUTE **/

/* USER */
Route::get('user', ['as' => 'visitor.user.create', 'uses' => 'Visitor\UserController@create']);

Route::middleware(['auth'])->group(function () {

    /** BEGIN PERSON ROUTE **/
    route::get('/missing-person', ['as' => 'site.person.index', 'uses' => 'Site\PersonController@index']);
    route::get('/my-person', ['as' => 'site.person.list', 'uses' => 'Site\PersonController@list']);
    route::get('/missing-person-create', ['as' => 'user.person.create', 'uses' => 'Site\PersonController@create']);
    route::post('/missing-person-store', ['as' => 'user.person.store', 'uses' => 'Site\PersonController@store']);
    route::get('/missing-person/detail/{id}', ['as' => 'user.person.detail', 'uses' => 'Site\PersonController@details']);
    route::get('/missing-person/search', ['as' => 'user.person.search', 'uses' => 'Site\PersonController@search']);
    route::put('/missing-person/updateClose/{id}', ['as' => 'user.person.updateClose', 'uses' => 'Site\PersonController@destroy']);
    route::put('/missing-person/updateOpen/{id}', ['as' => 'user.person.updateOpen', 'uses' => 'Site\PersonController@update']);
    /** END PERSON ROUTE **/

    /** BEGIN PERSON COMMENT ROUTE **/
    route::post('/user/personComment/store', ['as' => 'user.personComment.store', 'uses' => 'Site\personCommentController@store']);
    route::post('/user/personComment/store/{id}', ['as' => 'user.personComment.storeAs', 'uses' => 'Site\personCommentController@storeAs']);
    /** END PERSON COMMENT ROUTE **/

    /** BEGIN VEHICLE ROUTE **/
    route::get('/missing-vehicle', ['as' => 'site.vehicle.index', 'uses' => 'Site\VehicleController@index']);
    route::get('/my-vehicle', ['as' => 'site.vehicle.list', 'uses' => 'Site\VehicleController@list']);
    route::get('/missing-vehicle-create', ['as' => 'user.vehicle.create', 'uses' => 'Site\VehicleController@create']);
    route::post('/missing-vehicle-store', ['as' => 'user.vehicle.store', 'uses' => 'Site\VehicleController@store']);
    route::get('/missing-vehicle/detail/{id}', ['as' => 'user.vehicle.detail', 'uses' => 'Site\VehicleController@details']);
    route::get('/missing-vehicle/search', ['as' => 'user.vehicle.search', 'uses' => 'Site\VehicleController@search']);
    route::put('/missing-vehicle/updateClose/{id}', ['as' => 'user.vehicle.updateClose', 'uses' => 'Site\VehicleController@destroy']);
    route::put('/missing-vehicle/updateOpen/{id}', ['as' => 'user.vehicle.updateOpen', 'uses' => 'Site\VehicleController@update']);
    /** END VEHICLE ROUTE **/

    /** BEGIN VEHICLE GALLERY ROUTE **/
    route::get('/missing-vehicle-Gallery/{id}', ['as' => 'user.vehicleGallery.detail', 'uses' => 'Site\VehicleGalleryController@detail']);
    route::post('missing-vehicle-Gallery/store/{id}', ['as' => 'user.vehicleGallery.store', 'uses' => 'Site\VehicleGalleryController@store']);
    /** END VEHICLE GALLERY ROUTE **/

    /** BEGIN PERSON COMMENT ROUTE **/
    route::post('/user/vehicleComment/store', ['as' => 'user.vehicleComment.store', 'uses' => 'Site\vehicleCommentController@store']);
    route::post('/user/vehicleComment/store/{id}', ['as' => 'user.vehicleComment.storeAs', 'uses' => 'Site\vehicleCommentController@storeAs']);
    /** END PERSON COMMENT ROUTE **/
});

/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
