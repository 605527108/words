<?php

get('/',function() 
{
	return view('guestbook');
});

get('/time',function() 
{
	return view('timebook');
});

get('detail/{name}','WordController@show');

Route::group(['prefix' => 'api/v1'],function(){
    Route::get('search/{name}','WordController@index');
    Route::post('update','WordController@update');
    Route::post('time','WordController@time');
    Route::get('book/{name}','BookController@index');
    Route::post('book/store','BookController@store');
});

post('/create','WordController@store');