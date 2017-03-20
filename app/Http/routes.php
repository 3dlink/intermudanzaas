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
| http://laravel.com/docs/5.1/authentication
| http://laravel.com/docs/5.1/authorization
| http://laravel.com/docs/5.1/routing
| http://laravel.com/docs/5.0/schema
| http://socialiteproviders.github.io/
|
*/

// PAGE ROUTE ALIASES
Route::get('home', function () {
    return redirect('/');
});
Route::get('app', function () {
    return redirect('/');
});
Route::get('dashboard', function () {
    return redirect('/');
});

// ALL AUTHENTICATION ROUTES - HANDLED IN THE CONTROLLERS
Route::controllers([
	'auth' 		=> 'Auth\AuthController',
	'password' 	=> 'Auth\PasswordController',
]);

// REGISTRATION EMAIL CONFIRMATION ROUTES
Route::get('/resendEmail', 'Auth\AuthController@resendEmail');
Route::get('/activate/{code}', 'Auth\AuthController@activateAccount');

// AUTHENTICATION ALIASES/REDIRECTS
Route::get('login', function () {
    return redirect('auth/login');
});
Route::get('logout', function () {
    return redirect('auth/logout');
});
Route::get('register', function () {
    return redirect('auth/register');
});
Route::get('reset', function () {
    return redirect('password/email');
});

// ROUTE FOR USER PROFILE IMAGES
Route::get('images/profile/{id}/pics/{image}', [
	'uses' 		=> 'ProfilesController@userProfilePicImage'
]);

// USER PAGE ROUTES - RUNNING THROUGH AUTH MIDDLEWARE
Route::group(['middleware' => 'auth'], function () {

	// HOMEPAGE ROUTE
	Route::get('/', [
	    'as' 		=> 'user',
	    'uses' 		=> 'UserController@index'
	]);

	Route::get('/test', 'RoomsController@test');

	// INCEPTIONED MIDDLEWARE TO CHECK TO ALLOW ACCESS TO CURRENT USER ONLY
	Route::group(['middleware'=> 'currentUser'], function () {
			Route::resource(
				'profile',
				'ProfilesController', [
					'only' 	=> [
						'show',
						'edit',
						'update'
					]
				]
			);
	});

	Route::get('profile/{id}', [
		'as' 		=> 'profile.show',
		'uses' 		=> 'ProfilesController@show'
	]);

	Route::get('profile/{id}/edit', [
		'as' 		=> 'profile.edit',
		'uses' 		=> 'ProfilesController@edit'
	]);
});

// ADMINISTRATOR ACCESS LEVEL PAGE ROUTES - RUNNING THROUGH ADMINISTRATOR MIDDLEWARE
Route::group(['middleware' => 'administrator'], function () {

	// SHOW ALL USERS PAGE ROUTE
	Route::resource('users', 'UsersManagementController');
	Route::get('users', [
		'as' 			=> '{username}',
		'uses' 			=> 'UsersManagementController@showUsersMainPanel'
	]);
	Route::get('getTotalUsers', [
		'as'			=> 'total',
		'uses'			=> 'UsersManagementController@getUsersTotal'
	]);
	Route::resource('rooms', 'RoomsController');
	Route::resource('objects', 'ObjectsController');
	Route::resource('boxes', 'BoxesController');
});