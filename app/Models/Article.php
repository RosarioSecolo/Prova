<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;


class Article extends Model
{
    use HasFactory;
    protected $fillable=['title','subtitle','body','image','user_id','category_id'];
    
    /**
     * Relation between the models User and Article
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Relation between the models Category and Article
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
