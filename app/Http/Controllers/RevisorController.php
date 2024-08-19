<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class RevisorController extends Controller
{
    public function dashboard(){
        $unrevisionedArticles=Article::where('is_accepted',NULL)->get();
        $acceptedArticles=Article::where('is_accepted',TRUE)->get();
        $rejectedArticles=Article::where('is_accepted',FALSE)->get();

        return view('revisor.dashboard',compact('unrevisionedArticles','acceptedArticles','rejectedArticles'));
    }

    public function acceptArticle(Article $article){
        $article->is_accepted=TRUE;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message','Articolo pubblicato!');
    }

    public function rejectArticle(Article $article){
        $article->is_accepted=FALSE;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message','Articolo respinto!');
    }

    public function undoArticle(Article $article){
        $article->is_accepted=NULL;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message','Articolo rimandato in revisione!');
    }
}
