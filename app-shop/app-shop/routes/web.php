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

Route::get('/', 'TestController@welcome');
//Route::get('/register', 'Auth\RegisterController@index');
/*Route::get('/', function(){

	$user=App\User::find(1)->categorys()->orderBy('name')->get();

	return $user->first()->name;
});*/
/*Route::get('/', function(){

	$category=App\Category::find(1);

	return $category->users->first()->email;
});*/
Auth::routes();

Route::get('/search', 'SearchController@show');
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');
Route::post('/cart', 'CartDetailController@store');
Route::post('/cartDelete', 'CartDetailController@destroy');
Route::post('/order', 'CartController@update');
Route::post('/comment/create','CommentController@create');//crear comentario
Route::post('/commentDelete/{id}','CommentController@destroy');//eliminar comentario
Route::get('/like/{id}', 'LikeController@create');//like


Route::middleware(['auth','admin'])->group(function(){

	Route::get('/admin/products', 'Admin\ProductController@index');//listado
	Route::get('/admin/products/create', 'Admin\ProductController@create');//crear
	Route::post('/admin/products', 'Admin\ProductController@store');//crear mandar a la base de datos

	Route::get('/admin/products/{id}/edit', 'Admin\ProductController@edit');//crear
	Route::post('/admin/products/{id}/edit', 'Admin\ProductController@update');//crear 
	Route::post('/admin/products/{id}/delete', 'Admin\ProductController@destroy');

	Route::get('/admin/products/{id}/images', 'Admin\ImageController@index');
	Route::post('/admin/products/{id}/image', 'Admin\ImageController@store');
	Route::post('/admin/products/{id}/ima', 'Admin\ImageController@destroy');
	Route::get('/admin/products/{id}/images/select/{image}', 'Admin\ImageController@select');


	Route::get('/admin/categories', 'Admin\CategoryController@index');//listado
	Route::get('/admin/categories/create', 'Admin\CategoryController@create');//crear ---ya o e utiliza por vuej
	Route::post('/admin/categories', 'Admin\CategoryController@store');//crear mandar a la base de datos
	
	Route::get('/admin/categories/{id}/edit', 'Admin\CategoryController@edit');//crear
	Route::post('/admin/categories/{id}/edit', 'Admin\CategoryController@update');//crear 
	Route::put('/admin/categories/edit', 'Admin\CategoryController@update');//actualizar con vue
	Route::post('/admin/categories/delete', 'Admin\CategoryController@destroy');//eliminar con vue
	Route::post('/admin/categories/{id}/delete', 'Admin\CategoryController@destroy');

	Route::get('/admin/editoriales', 'Admin\EditorialController@index');//listado
	Route::get('/admin/editoriales/create', 'Admin\EditorialController@create');//crear
	Route::post('/admin/editoriales', 'Admin\EditorialController@store');//crear mandar a la base de datos
	Route::put('/admin/editoriales/edit', 'Admin\EditorialController@update');//crear
	Route::post('/admin/editoriales/{id}/edit', 'Admin\EditorialController@update');//crear 
	Route::post('/admin/editoriales/delete', 'Admin\EditorialController@destroy');
	
	Route::get('/admin/pro', 'Admin\AdminController@show');

	//chat

	Route::get('/admin/chat', 'Admin\ChatController@index');


	
});
