 <?php

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

/* Rutas protegidas */

Auth::routes();

Route::middleware(['auth'])->group(function () {
    
    Route::name('conduct_create')->get('/conduct_create', 'ConductController@create');

	Route::name('conduct_store')->post('/conduct', 'ConductController@store');

	
	Route::name('conduct_show')->get('/conducts/{conduct}', 'ConductController@show');

	// Pagos
	Route::name('payouts_path')->get('/payouts', 'PayoutController@index');

	Route::name('store_payout_path')->post('/payouts', 'PayoutController@store');
	Route::name('update_payout_path')->put('/payouts', 'PayoutController@update');
	Route::name('delete_payout_path')->delete('/payouts', 'PayoutController@delete');
	Route::name('create_payout_path')->get('/payouts/create', 'PayoutController@create');
	Route::name('edit_payout_path')->get('/payouts/edit', 'PayoutController@edit');
});

// Rutas de los comentarios, falta acomodar lo de editar
Route::name('comments_path')->get('/comments', 'CommentController@index');

Route::name('store_comment_path')->post('/comments', 'CommentController@store');
Route::name('update_comment_path')->put('/comments', 'CommentController@update');
Route::name('delete_comment_path')->delete('/comments', 'CommentController@delete');
Route::name('create_comment_path')->get('/comments/create', 'CommentController@create');

// Fin comentarios

Route::get('/home', 'HomeController@index')->name('home');

Route::name('profile')->get('/profile_show','HomeController@profile_show');

Route::name('profile_edit')->get('/profile/edit', 'HomeController@profile_edit');

Route::name('update_profile')->put('profile/update','HomeController@profile_update');

Route::name('img_store')->post('profile/img', 'HomeController@img_store');

/*
RUTAS DE ADMINISTRACION
 */

Route::name('ad_index')->get('/admin/index', 'AdminController@index');
Route::name('show_user')->get('/admin/user_show', 'AdminController@show_user');
Route::name('show_conduct')->get('/admin/conduc_show', 'AdminController@show_conduct');
Route::name('show_pagos')->get('/admin/pagos', 'AdminController@show_pagos');
Route::name('confirm_pago')->put('/admin/pagos', 'PayoutController@confirm_pago');
Route::name('delete_pago')->delete('/admin/pagos', 'AdminController@deletePayout');
Route::name('delete_conduct')->delete('/admin/{conduct_de}', 'AdminController@destroy');
Route::name('verif_perfil')->put('admin/verif', 'ConductController@activar_profile');
/*
RUTAS PUBLICAS
 */

Route::name('conducts')->get('/conducts', 'ConductController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::name('viajero')->get('/viajero', function() {
	return view('viajero');
});

Route::name('conductor')->get('/conductor', function() {
	return view('conduct');
});

Route::name('admin')->get('/admin', function() {
	return view('admin.index_admin');
});