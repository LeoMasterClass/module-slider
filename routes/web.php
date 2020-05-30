<?php

use Illuminate\Support\Facades\Route;
use App\Slider;

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
    $showSlider = Slider::all()->where('is_published', 1);
    return view('welcome', compact('showSlider'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('admin/slider/publier', 'Admin\SliderController@publier')->name('admin.slider.publier');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function() {

    Route::resource('slider','SliderController');

    Route::resource('users','UsersController');

});
