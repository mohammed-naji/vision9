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

use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RelationController;
use App\Http\Controllers\Site1Controller;
use App\Http\Controllers\Site2Controller;
use App\Http\Controllers\Site3Controller;
use Database\Factories\PostFactory;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\NewController;

// Route::get('/contact', [NewController::class, 'contact'])->name('contact');
// Route::post('/contact', [NewController::class, 'contact_data'])->name('contact_data');

Route::get('/', function() {
    return 'Home Page';
});

Route::get('site1', [Site1Controller::class, 'index'])->name('index');

Route::prefix('site2')->name('site2.')->group(function() {
    Route::get('/', [Site2Controller::class, 'index'])->name('index');
    Route::get('/about', [Site2Controller::class, 'about'])->name('about');
    Route::get('/contact', [Site2Controller::class, 'contact'])->name('contact');
    Route::get('/post', [Site2Controller::class, 'post'])->name('post');
});

Route::prefix('site3')->name('site3.')->group(function() {
    Route::get('/', [Site3Controller::class, 'index']);
    Route::get('/about', [Site3Controller::class, 'about'])->name('about');
    Route::get('/experience', [Site3Controller::class, 'experience'])->name('experience');
    Route::get('/education', [Site3Controller::class, 'education'])->name('education');
    Route::get('/skills', [Site3Controller::class, 'skills'])->name('skills');
    Route::get('/interests', [Site3Controller::class, 'interests'])->name('interests');
    Route::get('/awards', [Site3Controller::class, 'awards'])->name('awards');
});

Route::get('/form1', [FormController::class, 'form1'])->name('form1');
Route::post('/form1', [FormController::class, 'form1_data'])->name('form1_data');

Route::get('/form2', [FormController::class, 'form2'])->name('form2');
Route::post('/form2', [FormController::class, 'form2_data'])->name('form2_data');

Route::get('/form3', [FormController::class, 'form3'])->name('form3');
Route::post('/form3', [FormController::class, 'form3_data'])->name('form3_data');

Route::get('/form4', [FormController::class, 'form4'])->name('form4');
Route::post('/form4', [FormController::class, 'form4_data'])->name('form4_data');

Route::get('/full_form', [FormController::class, 'full_form'])->name('full_form');
Route::post('/full_form', [FormController::class, 'full_form_data'])->name('full_form_data');

Route::get('contact-us', [FormController::class, 'contact_us'])->name('contact_us');
Route::post('contact-us', [FormController::class, 'contact_us_data'])->name('contact_us_data');

// CRUD
// C => Create
// R => Read
// U => Update
// D => Delete

Route::get('posts', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');

Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');

Route::put('posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('posts/{id}', [PostController::class, 'show'])->name('posts.show');

Route::delete('posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('posts-trash', [PostController::class, 'trash'])->name('posts.trash');

Route::get('posts-restore/{id}', [PostController::class, 'restore'])->name('posts.restore');

Route::get('posts-forcedelete/{id}', [PostController::class, 'forcedelete'])->name('posts.forcedelete');

Route::get('posts-search', [PostController::class, 'search'])->name('posts.search');


// Route::get('/{any}', function() {
//     echo 'Not Found';
// });

Route::get('one-to-one', [RelationController::class, 'one_to_one']);
Route::get('one-to-many', [RelationController::class, 'one_to_many']);
