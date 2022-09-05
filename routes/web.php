<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestController;

// Route::get('url', Action);
// Route::post('url', Action);
// Route::put('url', Action);
// Route::patch('url', Action);
// Route::delete('url', Action);

// use
// namespace

// ::
// =>
// .
// $
// ->
// as


// home, about, contact, team

// Route::post('/', function () {
//     return 'Home page - Post';
// });

// Route::put('/', function () {
//     return 'Home page - Put';
// });

// Route::delete('/', function () {
//     return 'Home page - Delete';
// });

// Route::get('/', function () {
//     return 'Home page - Get';
// });

// Route::get('/user/profile', function() {
//     return 'User Profile';
// });


// Route::match(['get', 'post'], '/', function() {
//     return 'Homepage';
// });

// Route::any('/', function() {
//     return 'Home Page - Any';
// });

// Route::get('/welcome', function() {
//     return 'Welcome Page';
// });

// Route::get('news', function() {
//     return 'News';
// });

// Route::get('news/{id?}', function($id = 1) {
//     return 'News ' . $id;
// });

// Route::get('welcome/{name}/{age}/{username}', function($name, $age, $username) {
//     // if(str_contains()) {

//     // }

//     // if(preg_match('[0-9a-zA-Z]', $name)) {

//     // }
//     return "Welcome $name, your age is $age, username : $username";
// })->whereAlpha('name')->whereNumber('age')->whereAlphaNumeric('username');

// https://www.instagram.com/mohnaji94/

// include 'admin.php';

// Route::get('welcome/{name}/{age}/{username}', function($name, $age, $username) {
//     return "Welcome $name, your age is $age, username : $username";
// })->whereAlpha('name')->whereNumber('age')->whereAlphaNumeric('username')->name('welcome');

// Route::get('/', [TestController::class, 'welcome'])->name('dd');
// Route::get('/about-us', [TestController::class, 'about'])->name('about');

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\NewController;

// Route::get('/', [NewController::class, 'index'])->name('home');
// Route::get('/about', [NewController::class, 'about'])->name('about');
// Route::get('/contact', [NewController::class, 'contact'])->name('contact');
// Route::get('/post/{id?}', [NewController::class, 'post'])->name('post');

use App\Http\Controllers\Site1Controller;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\NewController;

// Route::get('/contact', [NewController::class, 'contact'])->name('contact');
// Route::post('/contact', [NewController::class, 'contact_data'])->name('contact_data');

Route::get('site1/about', [Site1Controller::class, 'index'])->name('index');
