<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/','FrontEnd@home');
Route::get('/Tour/{id}/{name}','FrontEnd@Tourview');
Route::get('/category/{id}/{name}','FrontEnd@category');


Route::get('/contact','FrontEnd@contact');
Route::post('/contact','FrontEnd@contactSend');
Route::get('/order/{id}','FrontEnd@order');
Route::post('/order/{id}','FrontEnd@orderDo');


Route::get('/albumdetails/{id}/{name}','FrontEnd@albumview');




Route::get('/admin','AdminGuestController@index');
Route::post('/admin', 'AdminGuestController@authenticate');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {


	Route::resource('/dashboard','AdminController@dashboard');
	Route::resource('/logout','AdminController@logout');
	Route::get('/changepassword','AdminController@changepassform');
	Route::post('/changepassword', 'AdminController@makechangepass');


	/// ---------------------------------- >>>>>> Category
	Route::get('/category', 'AdminController@catview');
	Route::post('/category', 'AdminController@catOperation');
	Route::delete('/deletecat', 'AdminController@catDelete');
	/// ---------------------------------- >>>>>> Category


	/// ---------------------------------- >>>>>> TOUR
	Route::get('/Tour', 'AdminController@TourView');
	Route::get('/Tour/add', 'AdminController@TourAdd');
	Route::post('/Tour/add', 'AdminController@TourAdded');
	Route::delete('/deletetour', 'AdminController@TourDelete');

	Route::get('/edittour/{id}', 'AdminController@TourEdit');
	Route::post('/edittour/{id}', 'AdminController@TourUpdate');
	Route::post('/tourFeatured', 'AdminController@TourFeatured');
	/// ---------------------------------- >>>>>> TOUR



	/// ---------------------------------- >>>>>> Settings

	Route::get('/generalsetting', 'AdminController@generalsetting');
	Route::post('/generalsetting', 'AdminController@generalsettingUpdate');
	Route::get('/logosetting', 'AdminController@logo');
	Route::post('/logosetting', 'AdminController@logoUpload');
	// Route::get('/footerlogosetting', 'AdminController@flogo');
	// Route::post('/footerlogosetting', 'AdminController@flogoUpload');
	// Route::get('/topimgsetting', 'AdminController@topimg');
	// Route::post('/topimgsetting', 'AdminController@topimgUpload');
	Route::get('/slidersetting', 'AdminController@slider');
	Route::post('/slidersetting', 'AdminController@sliderUpload');
	Route::delete('/deleteSlider', 'AdminController@SliderDelete');
	Route::get('/partnerlogosetting', 'AdminController@partner');
	Route::post('/partnerlogosetting', 'AdminController@partnerUpload');
	Route::delete('/deletePartnerImage', 'AdminController@partnerDelete');
	Route::get('/socialsetting', 'AdminController@social');
	Route::post('/socialsetting', 'AdminController@socialUpdate');
	Route::get('/homesetting', 'AdminController@homesetting');
	Route::post('/homesetting', 'AdminController@homesettingUpdate');



	Route::get('/album', 'AdminController@ShowAlbums');
	Route::get('/album/add', 'AdminController@AddAlbums');
	Route::post('/album/add', 'AdminController@AddAlbumsDo');
	Route::get('/editalbum/{id}', 'AdminController@editalbum');
	Route::post('/editalbum/{id}', 'AdminController@editalbumDo');
	Route::delete('/deleteAlbum', 'AdminController@deleteAlbum');
	Route::get('/viewalbum/{id}', 'AdminController@viewalbum');
	Route::post('/viewalbum/{id}', 'AdminController@viewalbumDo');
	Route::delete('/deleteAlbumImg', 'AdminController@deleteAlbumImg');


	Route::get('/orders', 'AdminController@orders');
	Route::get('/vieworder/{id}', 'AdminController@vieworder');
	Route::post('/vieworder/{id}', 'AdminController@vieworderDo');

	// Route::get('/footermenusetting', 'AdminController@footer');
	// Route::post('/footermenusetting', 'AdminController@footerUpdate');
	// Route::post('/addfoter', 'AdminController@addfoter');
	// Route::delete('/deletefootmenu', 'AdminController@deletefootmenu');
	// Route::get('/editfootmenu/{id}', 'AdminController@editfootmenu');
	// Route::post('/editfootmenu/{id}', 'AdminController@editfootmenuUpdate');



});









