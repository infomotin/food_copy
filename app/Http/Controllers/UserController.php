<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan; 

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function Index()
    {
        // Artisan::call('optimize');
        return view('frontend.index');
    }
}
