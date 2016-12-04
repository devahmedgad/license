<?php
Route::get('login','HomeController@Login');	
Route::post('login','HomeController@doLogin');	

Route::group(['middleware'=>'authAdmin'],function(){
	Route::get('/','HomeController@index');	
	Route::get('logout','HomeController@Logout');
	Route::resource('projects','ProjectsCtrl');

	Route::get('projects/switch/{id}','ProjectsCtrl@switchCase');

});

Route::get('api','ProjectsCtrl@api');	
