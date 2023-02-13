<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Admin;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::with('user')->orderBy('id' , 'desc')->paginate(10);
        $this->authorize('viewAny' , Admin::class);

        return response()->view('cms.admin.index' , compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $roles = Role::where('guard_name' , 'admin')->get();
        $this->authorize('create' , Admin::class);

        return response()->view('cms.admin.create' , compact('cities' , 'roles'));
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
        $admins = new Admin();
        $admins->email = $request->get('email');
        $admins->password = Hash::make($request->get('password'));

        $isSaved = $admins->save();

        if($isSaved){
       

        $users = new User();

        $roles = Role::findOrFail($request->get('role_id'));
        $admins->assignRole($roles->name);

        if (request()->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . 'image.' . $image->getClientOriginalExtension();

            $image->move('storage/images/admin', $imageName);

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
        $users->actor()->associate($admins);

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
        $admins = Admin::findOrFail($id);
        $this->authorize('update' , Admin::class);

        return response()->view('cms.admin.edit' , compact('cities' , 'admins'));
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
            $admins = Admin::findOrFail($id);
            $admins->email = $request->get('email');
            $admins->password = Hash::make($request->get('password'));

            $isUpdate = $admins->save();

            if($isUpdate){
            $users = $admins->user;

            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/admin', $imageName);

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
            $users->actor()->associate($admins);
            $isUpdate = $users->save();
            return ['redirect' =>route('admins.index')];

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
        $admins = Admin::destroy($id);
        $this->authorize('destroy' , Admin::class);

    }
}
