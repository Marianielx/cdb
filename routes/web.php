<?php

use Illuminate\Support\Facades\Route;

/* HOME */
route::get('/', ['as' => 'site.home', 'uses' => 'Site\HomeController@index']);

/* Terms */
route::get('/terms', ['as' => 'site.terms', 'uses' => 'Site\TermsController@index']);

/** BEGIN PERSON FREE ROUTE **/
route::get('/missing-person/show/{id}', ['as' => 'user.person.show', 'uses' => 'Site\PersonController@show']);
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
    /** END PERSON ROUTE **/

    /** BEGIN PERSON COMMENT ROUTE **/
    route::post('/user/personComment/store', ['as' => 'user.personComment.store', 'uses' => 'Site\personCommentController@store']);
    route::post('/user/personComment/store/{id}', ['as' => 'user.personComment.storeAs', 'uses' => 'Site\personCommentController@storeAs']);
    /** END PERSON COMMENT ROUTE **/
});

/* inclui as rotas de autenticação do ficheiro auth.php */
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
