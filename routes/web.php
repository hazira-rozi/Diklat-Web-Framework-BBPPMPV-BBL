<?php
use App\Models\Siswa;
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
    return view('dashboard', ["title"=>"Dashboard" ,  "sitemap"=>'Dashboard']);
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
/*Route Siswa*/
Route::get('/siswa', function(){
    $data_siswa = Siswa::paginate('10');
    return view('siswa.index', ["data_siswa"=> $data_siswa,
                                "title"=>"Home", 
                                "sitemap"=>'Siswa']);
});
/*Akhir Route Siswa*/


Route::get('/dashboard', function(){
    return view('dashboard', ["title"=>"Dashboard", "sitemap"=>'Dashboard']);
});