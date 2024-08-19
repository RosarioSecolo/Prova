<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;




class ArticleController extends Controller implements HasMiddleware
{
    /**
     * Implementation of the middleware to block non authenticate users
     */
    public static function middleware(){
        return [new Middleware('auth',except:['index','show','byCategory','byWriter']),];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles=Article::where('is_accepted',TRUE)->orderBy('created_at','DESC')->get();
        return view('article.index',compact('articles'));
    }

    public function byCategory(Category $category)
    {
        $articles=$category->articles()->where('is_accepted',TRUE)->orderBy('created_at','DESC')->get();
        return view('article.by-category',compact('category','articles'));
    }

    public function byWriter(User $user)
    {
        $articles=$user->articles()->where('is_accepted',TRUE)->orderBy('created_at','DESC')->get();
        return view('article.by-writer',compact('user','articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //It calls the view containing the form of article's creation
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:articles|min:5',
            'subtitle'=>'required|min:5',
            'body'=>'required|min:10',
            'image'=>'required|image',
            'category'=>'required',
        ]);
        $article=Article::create([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'body'=>$request->body,
            'image'=>$request->file('image')->store('public/images'),
            'category_id'=>$request->category,
            'user_id'=>Auth::user()->id,
        ]);
        return redirect(route('homepage'))->with('message','Articolo creato con successo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
