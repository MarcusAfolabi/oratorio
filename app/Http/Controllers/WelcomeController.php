<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        header('Cache-Control: public, max-age=604800');
        return view('welcome');
    }
}
