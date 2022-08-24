<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    
    public function index(){
        return view('dashboard', ["title"=>"Dashboard", "sitemap"=>'Main']);
    }
    public function dashboard(){
        return view('dashboard', ["title"=>"Dashboard", "sitemap"=>'Main']);
    }

    public function about(){
        return view('about', ["title"=>"About", "sitemap"=>'Help']);
    }
    public function contacts(){
        return view('contacts', ["title"=>"Contacts", "sitemap"=>'Help']);
    }
    public function gallery(){
        return view('gallery', ["title"=>"Gallery", "sitemap"=>'Main']);  
    }

}
