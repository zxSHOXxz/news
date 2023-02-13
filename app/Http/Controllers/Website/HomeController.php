<?php

namespace App\Http\Controllers\Website;
use App\Models\Category;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $categories = Category::all();
        $sliders = Slider::all();
        $articles = Article::take(3)->orderBy('created_at' , 'desc')->get();
        return response()->view('website.index' , compact('categories' , 'sliders' , 'articles'));
    }
    public function all($id){

        $categories = Category::find($id);
        $articles = Article::where('category_id' , $id)->orderBy('created_at' , 'desc')->paginate(4);
        return response()->view('website.all-news' , compact('categories' , 'id' , 'articles'));
    }

    public function det($id){
        $articles = Article::find($id);
        return response()->view('website.newsdetailes' , compact('articles' , 'id'));
    }

    public function contact(){
        return response()->view('website.contact');
    }

    public function storeContact(Request $request){

        $validator = validator($request->all(),[


        ] ,[

        ]);

        if(! $validator->fails()){

            $contact = new Contact();
            $contact->name = $request->get('name');
            $contact->email = $request->get('email');
            $contact->mobile = $request->get('mobile');
            $contact->message = $request->get('message');

            $isSaved = $contact->save();

            return response()->json(['icon' => $isSaved ? "success" : "error" , 'title' => $isSaved ? "Contact is Successfully" : "Contact is Failed"] , $isSaved ? 200 : 400);

         }
        else{
            return response()->json(['icon' => 'error' , 'title' => getMessageBag()->first()] , 400);
        }
    }

}
