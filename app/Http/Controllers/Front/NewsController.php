<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Category;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $sliders = Slider::take(2)->orderBy('id' , 'desc')->get();
        $articles = Article::take(3)->orderBy('updated_at' , 'desc')->get();
        $categories = Category::all();
        return response()->view('news.index' , compact('sliders' , 'articles' , 'categories'));
    }

    public function all($id){

        $categories = Category::findOrFail($id);
        $articles = Article::where('category_id' , $id)->paginate(4);
        return response()->view('news.all-news' , compact('id' , 'categories' , 'articles'));
    }

    public function det($id){

        $articles = Article::findOrFail($id);
        return response()->view('news.newsdetailes' , compact('id' , 'articles'));
    }
}
