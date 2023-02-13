<?php

namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\City;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('user')->withCount('articles')->orderBy('id' , 'desc')->paginate(10);
        return response()->view('cms.author.index' , compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return response()->view('cms.author.create' , compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

        ] , [

        ]);

        if(! $validator->fails()){
        $authors = new Author();
        $authors->email = $request->get('email');
        $authors->password = Hash::make($request->get('password'));

        $isSaved = $authors->save();

        if($isSaved){
        $users = new User();

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/author', $imageName);

            $users->image = $imageName;
            }

        $users->first_name = $request->get('first_name');
        $users->last_name = $request->get('last_name');
        $users->date = $request->get('date');
        $users->mobile = $request->get('mobile');
        $users->gender = $request->get('gender');
        $users->status = $request->get('status');
        $users->address = $request->get('address');
        $users->city_id = $request->get('city_id');
        $users->actor()->associate($authors);

        $isSaved = $users->save();
        if($isSaved){
            return response()->json(['icon' => 'success' , 'title' =>'Created is Successfully'] , 200);
        }
        else{
            return response()->json(['icon' => 'error' , 'title' =>'Created is Failed'] , 400);

        }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $authors = Author::findOrFail($id);
        return response()->view('cms.author.edit' , compact('cities' , 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = validator($request->all(),[
            'password' => 'nullable',
            'image'=>"required|image|max:2048|mimes:png,jpg,jpeg,pdf",

            ] , [

            ]);

            if(! $validator->fails()){
            $authors = Author::findOrFail($id);
            $authors->email = $request->get('email');
            $authors->password = Hash::make($request->get('password'));

            $isUpdate = $authors->save();

            if($isUpdate){
            $users = $authors->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/author', $imageName);

                $users->image = $imageName;
                }

            $users->first_name = $request->get('first_name');
            $users->last_name = $request->get('last_name');
            $users->date = $request->get('date');
            $users->mobile = $request->get('mobile');
            $users->gender = $request->get('gender');
            $users->status = $request->get('status');
            $users->address = $request->get('address');
            $users->city_id = $request->get('city_id');
            $users->actor()->associate($authors);
            $isUpdate = $users->save();
            return ['redirect' =>route('authors.index')];

            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' =>'Updated is Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' =>'Updated is Failed'] , 400);

            }
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] , 400);

            }
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::destroy($id);
    }
}
