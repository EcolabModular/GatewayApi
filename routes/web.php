<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
DB_CONNECTION=mysql
DB_HOST=ecolab2.c6xsi0x06m5s.us-east-1.rds.amazonaws.com
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=admin
DB_PASSWORD=ecolabuser
*/

/**
 * Routes protected by user credentials
 */


$router->group(['middleware' => 'auth:api'], function () use ($router) {
    $router->get('/info', 'UserController@me');
});


$router->group(['middleware' => 'client.credentials'], function() use($router){

    /**
     * Users routes
     */
    $router->get('/users', 'UserController@index');
    $router->post('/users', 'UserController@store');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->patch('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');
    //$router->get('/info', 'UserController@me');

    /**
     *  IU ELEMENTS ROUTES
     */
    $router->get('/uielements', 'iuElementController@index');
    $router->post('/uielements', 'iuElementController@store');
    $router->get('/userviews/{userType}', 'iuElementController@userElementsView');
    $router->get('/uielements/{element}', 'iuElementController@show');
    $router->put('/uielements/{element}', 'iuElementController@update');
    $router->patch('/uielements/{element}', 'iuElementController@update');
    $router->delete('/uielements/{element}', 'iuElementController@destroy');

    /**
     * DICTIONARY ROUTES
     */
    $router->get('/dictionaries','DictionaryController@index');
    $router->post('/dictionaries','DictionaryController@store');
    $router->get('/dictionaries/{dictionary}','DictionaryController@show');
    $router->put('/dictionaries/{dictionary}','DictionaryController@update');
    $router->patch('/dictionaries/{dictionary}','DictionaryController@update');
    $router->delete('/dictionaries/{dictionary}','DictionaryController@destroy');


    /**
     * FILES ROUTES
     */
    $router->get('/files', 'FileController@index');
    $router->post('/files', 'FileController@store');
    $router->get('/files/{file}', 'FileController@show');
    $router->put('/files/{file}', 'FileController@update');
    $router->patch('/files/{file}', 'FileController@update');
    $router->delete('/files/{file}', 'FileController@destroy');
    $router->post('/files/makereport', 'FileController@makeReport');
    /**
     * INSTITUTIONS ROUTES
     */
    $router->get('/institutions','InstitutionController@index');
    $router->post('/institutions','InstitutionController@store');
    $router->get('/institutions/{institution}','InstitutionController@show');
    $router->put('/institutions/{institution}','InstitutionController@update');
    $router->patch('/institutions/{institution}','InstitutionController@update');
    $router->delete('/institutions/{institution}','InstitutionController@destroy');

    /**
     * ITEMS ROUTES
     */
    $router->get('/items','ItemController@index');
    $router->post('/items','ItemController@store');
    $router->get('/items/{item}','ItemController@show');
    $router->put('/items/{item}','ItemController@update');
    $router->patch('/items/{item}','ItemController@update');
    $router->delete('/items/{item}','ItemController@destroy');


    /**
     * LABORATORIES ROUTES
     */
    $router->get('/laboratories', 'LaboratoryController@index');
    $router->post('/laboratories', 'LaboratoryController@store');
    $router->get('/laboratories/{laboratory}', 'LaboratoryController@show');
    $router->put('/laboratories/{laboratory}', 'LaboratoryController@update');
    $router->patch('/laboratories/{laboratory}', 'LaboratoryController@update');
    $router->delete('/laboratories/{laboratory}', 'LaboratoryController@destroy');

    /**
     * NOTES ROUTES
     */
    $router->get('/notes', 'NoteController@index');
    $router->get('/itemnotes/{item}', 'NoteController@notesItem');
    $router->post('/notes', 'NoteController@store');
    $router->get('/notes/{note}', 'NoteController@show');
    $router->put('/notes/{note}', 'NoteController@update');
    $router->patch('/notes/{note}', 'NoteController@update');
    $router->delete('/notes/{note}', 'NoteController@destroy');

    /**
     * REPORTS ROUTES
     */

    $router->get('/reports', 'ReportController@index');
    $router->post('/reports', 'ReportController@store');
    $router->get('/reports/{report}', 'ReportController@show');
    $router->put('/reports/{report}', 'ReportController@update');
    $router->patch('/reports/{report}', 'ReportController@update');
    $router->delete('/reports/{report}', 'ReportController@destroy');

    /**
     *  REPORT FIELDS ROUTES
     */
    $router->get('/fields', 'ReportFieldController@index');
    $router->post('/fields', 'ReportFieldController@store');
    $router->get('/reportfields/{reportType}', 'ReportFieldController@fieldsReport');
    $router->get('/fields/{reportField}', 'ReportFieldController@show');
    $router->put('/fields/{reportField}', 'ReportFieldController@update');
    $router->patch('/fields/{reportField}', 'ReportFieldController@update');
    $router->delete('/fields/{reportField}', 'ReportFieldController@destroy');

    /**
     * SCHEDULARIES ROUTES
     */
    $router->get('/schedularies','SchedularyController@index');
    $router->post('/schedularies','SchedularyController@store');
    $router->get('/itemschedulary/{item}','SchedularyController@itemSchedulary');
    $router->get('/schedularies/{schedulary}','SchedularyController@show');
    $router->put('/schedularies/{schedulary}','SchedularyController@update');
    $router->patch('/schedularies/{schedulary}','SchedularyController@update');
    $router->delete('/schedularies/{schedulary}','SchedularyController@destroy');

});
