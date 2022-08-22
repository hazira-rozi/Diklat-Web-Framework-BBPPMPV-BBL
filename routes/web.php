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

Route::get('/', function () {
    return view('index', ["title"=>"Home" ,  "sitemap"=>'Main']);
});

Route::get('/home', function(){
    return view('index' , ["title"=>"Home" ,  "sitemap"=>'Main']);
});

Route::get('/gallery', function(){
    return view('gallery' , ["title"=>"Gallery" ,  "sitemap"=>'Gallery']);
});

Route::get('/about', function(){
    return view('about', ["title"=>"About" , "sitemap"=>'Help']);
});
Route::get('/contacts', function(){
    return view('contacts', ["title"=>"Contacts", "sitemap"=>'Help']);
});

Route::get('/guru', function(){
    return view('guru.index', ["title"=>"Home", "sitemap"=>'Guru']);
});

Route::get('/siswa', function(){
    return view('siswa.index', ["title"=>"Home", "sitemap"=>'Siswa']);
});