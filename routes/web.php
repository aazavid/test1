<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/extraction', ['as' => 'find', function () {
    return view('searchForm',['error' => '']);
}]);

Route::post('/extraction', 'ExtractController@search');


Route::get('/extraction/{id}', ['as' => 'register', function ($id) {
    return view('registerForm',['id_nomber' => $id]);
}]);

Route::post('/extraction/{id}', 'ExtractController@register')->name('PostRegister');
