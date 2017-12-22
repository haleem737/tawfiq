<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Tawfiq Press';
        return view('pages.index')->with('title', $title);
    }
    
    public function about(){
        $title = 'About us';
        return view('pages.about')->with('title', $title);;
    }

    public function ourCustomers(){
        $title = 'Our Customers';
        return view('pages.ourclients')->with('title', $title);;
    }

    public function services(){
        $title = 'Our Services';
        return view('pages.services')->with('title', $title);;
    }

    public function coutacUs(){
        $title = 'Contact us';
        return view('pages.contactus')->with('title', $title);;
    }

}
