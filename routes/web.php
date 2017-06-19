<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/extraction', ['as' => 'find', function () {
    return view('searchForm',['error' => '']);
}]);

Route::post('/extraction', 'ExtractController@search');


Route::get('/extraction/{id}', 'ExtractController@showRegister')->name('register');



Route::post('/extraction/{id}', 'ExtractController@registerPost')->name('PostRegister');
