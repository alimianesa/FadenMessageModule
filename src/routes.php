<?php


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

Route::namespace('Faden\FadenMessageModule\Http\Controllers')->prefix('api')->group(function () {
   Route::prefix('v1')->group(function () {
       Route::prefix('faden')->group(function () {
           Route::prefix('message')->group(function () {
               Route::post('/push' , 'FadenMessageController@push');
               Route::post('/mail' , 'FadenMessageController@send');
               Route::post('/send' , 'FadenMessageController@mail');
           });
       });
   });
});





