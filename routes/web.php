
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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        /**
         * book Routes
         */
        Route::get('/books/create', 'BookController@create')->name('books.create');
        Route::post('/book', 'BookController@store')->name('books.store');
        Route::get('/books/index', 'BookController@index')->name('books.index');
        Route::get('/books/{id}', 'BookController@show')->name('books.show');
        Route::delete('/books/delect/{id}', 'BookController@destroy')->name('books.destroy');
        Route::get('/books/edit/{id}', 'BookController@edit')->name('books.edit');
        Route::put('/book/update/{id}', 'BookController@update')->name('books.update');

/**
         * user_types Routes
         */
        Route::get('/user_types/create', 'UserTypeController@create')->name('user_types.create');
        Route::post('/user_types/add', 'UserTypeController@store')->name('user_types.store');

       /** users  Routes
        */
        Route::get('/users/index', 'UserController@index')->name('users.index');
        Route::put('/users/update/{id}', 'UserController@update')->name('users.update');
        //Route::get('/users/create', 'UserController@create')->name('users.create');
        //Route::post('/users', 'UserController@store')->name('users.store');








        

    });
});

/*
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


Route::get('/', function () {
    return view('welcome');
});
Route::view('admin','admin');*/