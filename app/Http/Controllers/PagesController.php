<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutUs()

    {
    	return view('pages.about-us');
    }

    public function contactUs()
    {
    	return view('pages.contact-us');
    }
}
