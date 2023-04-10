<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    
    public function HomeMain(){
        return view('frontend.index');
    }// End Mehtod 


    public function Index(){
        return view('about');
    } // End Mehtod 


    public function ContactMethod(){
        return view('contact');
    } // End Mehtod


}