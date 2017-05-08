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
Route::get('/', 'HomeController@onePage');
Route::post("/contactMail", "ClientsController@contactFromWebpage");
Route::get('app', function () {
	return redirect('app');
});
Route::get('dashboard', function () {
	return redirect('app');
});


// ROUTE FOR USER PROFILE IMAGES
Route::get('images/profile/{id}/pics/{image}', [
	'uses' 		=> 'ProfilesController@userProfilePicImage'
	]);

Route::get('/images/{id}/especiales/{image}', [
	'uses' 		=> 'EstimacionController@getEspImg'
	]);
Route::get('/images/{id}/{image}', [
	'uses' 		=> 'EstimacionController@getRegularImg'
	]);


Route::group(['prefix' => 'app'], function () {

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
// Route::get('register', function () {
//     return redirect('auth/register');
// });
	Route::get('reset', function () {
		return redirect('password/email');
	});

// USER PAGE ROUTES - RUNNING THROUGH AUTH MIDDLEWARE
	Route::group(['middleware' => 'auth'], function () {

	// HOMEPAGE ROUTE
		Route::get('/', [
			'as' 		=> 'user',
			'uses' 		=> 'UserController@index'
			]);
		Route::get('/cambiarPwd', 'UsersManagementController@changePwd');
		Route::post('/modifyPwd', 'UsersManagementController@modifyPwd');


		Route::resource('estimaciones', 'EstimacionController');
		Route::get('estimaciones/fotos/{id}','EstimacionController@getFotos');
		Route::delete('estimaciones/fotos/{id}', 'EstimacionController@deleteFoto');
		Route::post('upload', [
			'uses' 		=> 'EstimacionController@upload',
			'as'		=> 'uploadEstimacionImg'
			]);
		Route::post('estimaciones/aceptar/{id}', 'EstimacionController@four2five');
		Route::post('estimaciones/rechazar/{id}', 'EstimacionController@four2two');
		Route::get('estimaciones/estado/{id}', [
			'uses' 		=> 'EstimacionController@getEstadosV',
			'as'		=> 'estimaciones.estado'
			]);
		Route::get('estimaciones/operativo/{id}', [
			'uses' 		=> 'EstimacionController@getOperativoV',
			'as'		=> 'estimaciones.operativo'
			]);
		Route::get('estimaciones/logistica/{id}', [
			'uses' 		=> 'EstimacionController@getLogisticaV',
			'as'		=> 'estimaciones.logistica'
			]);
		Route::get('estimaciones/upload/{id}', [
			'uses'		=> 'EstimacionController@getUploadView',
			'as'		=> 'getUploadPDF'
			]);
		Route::get('estimaciones/download/{id}', [
			'uses'		=> 'EstimacionController@getPDF',
			'as'		=> 'getUploadedPDF'
			]);
		Route::post('estimaciones/upload', [
			'uses'		=> 'EstimacionController@uploadPDF',
			'as'		=> 'uploadPDF'
			]);
		Route::put('estimaciones/estado/update/{id}', 'EstimacionController@updateEstado');
		Route::put('estimaciones/operativo/update/{id}', 'EstimacionController@updateOperativo');
		Route::put('estimaciones/logistica/update/{id}', 'EstimacionController@updateLogistica');

		Route::get('import', 'ClientsController@getExcelV');
		Route::get('excelE', 'ClientsController@excelExport');
		Route::post('excelI', 'ClientsController@excelImport');

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
	Route::group(['middleware' => 'VCL'], function () {
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
			Route::resource('paises', 'PaisController');
		});

		Route::group(['middleware' => 'coordinacion'], function() {
			Route::resource('rooms', 'RoomsController');
			Route::resource('objects', 'ObjectsController');
			Route::resource('boxes', 'BoxesController');
		});

		Route::resource('clientes', 'ClientsController');
		Route::post('clientes/activate/{id}', 'ClientsController@sendEmail');

	});
});