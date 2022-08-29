<?php

use Illuminate\Support\Facades\Route;

// Route::get('url', Action);
// Route::post('url', Action);
// Route::put('url', Action);
// Route::patch('url', Action);
// Route::delete('url', Action);

// use
// namespace


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

Route::any('/', function() {
    return 'Home Page - Any';
});
