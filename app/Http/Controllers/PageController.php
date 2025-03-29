<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutPage(){
        return view('website.pages.about');
    }
    public function servicesPage(){
        return view('website.pages.services');
    }
    public function projectsPage(){
        return view('website.pages.projects');
    }
    public function contactPage(){
        return view('website.pages.contact');
    }
    public function listProperties(){
        return view('website.pages.properties');
    }
    public function login(){
        return view('website.welcome');
    }
}
