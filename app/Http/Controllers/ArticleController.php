<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //

    public function __construct () {
        $this->middleware('auth')->except(['show' , 'index']);


    }
    public function index(){
        return view('/Article_views/articles');
    }

    public function make(){
        return view('/Article_views/create_article');
    }
    public function update(){
        return view('/Article_views/update_articles');
    }
    public function show(){
        return view('/Article_views/article');
    }


}
