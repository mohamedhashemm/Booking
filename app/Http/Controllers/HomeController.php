<?php

namespace App\Http\Controllers;

use App\Models\Hotel\Hotel;
use App\Models\Apartment\Apartment;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $hotels= Hotel::latest()->take(6)->get();

        $rooms= Apartment::select()->orderBy('id','desc')->take(6)->get();

        return view('home',compact('hotels','rooms'));
    }



    
    public function about(){


        return view('pages.about');
    }

    public function services(){


        return view('pages.services');
    }


    public function contact(){


        return view('pages.contact');
    }






}
