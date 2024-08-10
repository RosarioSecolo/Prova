<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PublicController extends Controller
{
    public function homepage(){
        $articles=Article::orderBy('created_at','DESC')->take(4)->get();
        return view('welcome',compact('articles'));
    }
}
