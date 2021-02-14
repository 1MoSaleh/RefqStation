<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{
    // to control anything about system like contact us .. about me ...etc
    public function __construct () {

    }
    // about us
    public function index(){
        return view();
    }
    // contact us
    public function contact(){
        return view();
    }

}
