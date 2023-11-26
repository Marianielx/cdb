<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Administrator;


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

/* Grupo de Rotas Autenticadas */
Route::post('contacts', [CustomerContactController::class, 'store']);

Route::middleware(['auth'])->group(function () {

  /* Manager Dashboard  */
  Route::get('admin/panel', ['as' => 'admin.home', 'uses' => 'Admin\DashboardController@index']);

  Route::middleware(['Administrator'])->group(function () {

    /* User */
    Route::get('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'Admin\UserController@index'])->withoutMiddleware(['Administrator']);
    Route::get('admin/user/create', ['as' => 'admin.user.create', 'uses' => 'Admin\UserController@create'])->withoutMiddleware(['Administrator']);
    Route::post('admin/user/store', ['as' => 'admin.user.store', 'uses' => 'Admin\UserController@store'])->withoutMiddleware(['Administrator']);
    Route::get('admin/user/show/{id}', ['as' => 'admin.user.show', 'uses' => 'Admin\UserController@show'])->withoutMiddleware(['Administrator']);
    Route::get('admin/user/edit/{id}', ['as' => 'admin.user.edit', 'uses' => 'Admin\UserController@edit'])->withoutMiddleware(['Administrator']);
    Route::put('admin/user/update/{id}', ['as' => 'admin.user.update', 'uses' => 'Admin\UserController@update'])->withoutMiddleware(['Administrator']);
    Route::get('admin/user/delete/{id}', ['as' => 'admin.user.delete', 'uses' => 'Admin\UserController@destroy'])->withoutMiddleware(['Administrator']);
    Route::get('admin/signup/logs', ['as' => 'admin.signup.log', 'uses' => 'Admin\CredencialController@log']);
    /* END */

    /* Person */
    Route::get('admin/person/index', ['as' => 'admin.person.index', 'uses' => 'Admin\PersonController@index'])->withoutMiddleware(['Administrator']);
    Route::get('admin/person/show/{id}', ['as' => 'admin.person.show', 'uses' => 'Admin\PersonController@show'])->withoutMiddleware(['Administrator']);
    /* END */

    /* Person Comment */
    Route::get('admin/personComment/index', ['as' => 'admin.personComment.index', 'uses' => 'Admin\PersonCommentController@index'])->withoutMiddleware(['Administrator']);
    Route::get('admin/personComment/show/{id}', ['as' => 'admin.personComment.show', 'uses' => 'Admin\PersonCommentController@show'])->withoutMiddleware(['Administrator']);
    /* END */

    /* Vehicle */
    Route::get('admin/vehicle/index', ['as' => 'admin.vehicle.index', 'uses' => 'Admin\VehicleController@index'])->withoutMiddleware(['Administrator']);
    Route::get('admin/vehicle/show/{id}', ['as' => 'admin.vehicle.show', 'uses' => 'Admin\VehicleController@show'])->withoutMiddleware(['Administrator']);
    /* END */

    /* Vehicle */
    Route::get('admin/gallery/show/{id}', ['as' => 'admin.gallery.show', 'uses' => 'Admin\VehicleGalleryController@index'])->withoutMiddleware(['Administrator']);
    /* END */

    /* Custom */
    Route::get('admin/custom/index', ['as' => 'admin.custom.index', 'uses' => 'Admin\CustomerController@index'])->withoutMiddleware(['Administrator']);
    Route::get('admin/custom/create', ['as' => 'admin.custom.create', 'uses' => 'Admin\CustomerController@create'])->withoutMiddleware(['Administrator']);
    Route::post('admin/custom/store', ['as' => 'admin.custom.store', 'uses' => 'Admin\CustomerController@store'])->withoutMiddleware(['Administrator']);
    Route::get('admin/custom/edit/{id}', ['as' => 'admin.custom.edit', 'uses' => 'Admin\CustomerController@edit'])->withoutMiddleware(['Administrator']);
    Route::put('admin/custom/update/{id}', ['as' => 'admin.custom.update', 'uses' => 'Admin\CustomerController@update'])->withoutMiddleware(['Administrator']);
    Route::get('admin/custom/show/{id}', ['as' => 'admin.custom.show', 'uses' => 'Admin\CustomerController@show'])->withoutMiddleware(['Administrator']);
    /* END */

    /* Custom */
    Route::get('admin/custom/contact/{id}', ['as' => 'admin.custom.contact', 'uses' => 'Admin\CustomerContactController@index'])->withoutMiddleware(['Administrator']);
    /* END */
  });
});
