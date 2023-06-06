<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/','PostController@index')->name('home');
Route::get('/post/create','PostController@create')->name('post.create');
Route::post('/post/create','PostController@store')->name('post.store');
Route::get('/post/edit/{title}','PostController@edit')->name('post.edit');
Route::post('/post/edit/{title}','PostController@update')->name('post.update');
Route::get('/post/delete/{title}','PostController@destory')->name('post.delete');
Route::get('/post/detail/{title}','PostController@detail')->name('post.detail');
// Route::get('/post/search','PostController@search')->name('post.search');
Route::get('/download-pdf','FunController@document')->name('download-pdf');

Route::get('/export', 'DemoController@export')->name('export');
Route::get('/importExportView', 'DemoController@importExportView');
Route::post('import', 'DemoController@import')->name('import');