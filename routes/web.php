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


// Route::get('slider', 'SliderController@index')->name('slider.index');
// Route::get('slider/edit', 'SliderController@edit')->name('slider.edit');


    Route::resource('slider','SliderController');

    // Route::resource('users','UsersController');

    Route::post('Publication-slider', 'SliderController@publier');
