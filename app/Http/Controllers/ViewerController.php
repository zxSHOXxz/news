<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Viewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ViewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $viewers = Viewer::with('user')->orderby('id', 'desc')->paginate(5);
        return response()->view('cms.viewers.index', compact('viewers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('cms.viewers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */




    public function store(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required ',
            'password' => 'required ',
            'image' => "required|image|max:2048|mimes:png,jpg,jpeg,pdf",


        ]);

        if (!$validator->fails()) {
            $viewer = new Viewer();
            $viewer->email = $request->email;
            $viewer->password = Hash::make($request->get('password'));
            $issaved = $viewer->save();


            $user = new User();
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/viewer', $imageName);

                $user->image = $imageName;
            }

            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->mobile = $request->mobile;
            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->city_id = $request->city_id;
            $user->actor()->associate($viewer); // to associate the new admin with the apropriate user.
            $isSaved = $user->save();
            if ($isSaved) {

                return response()->json(['icon' => 'success', 'title' => 'Created successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'fails to create'], 400);
            }
            return ['redirect' => route('viewers.index')];
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

        return response()->view('cms.viewers.index');
    }








    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */










    public function show($id)
    {
        $viewer = Viewer::findOrfail($id);
        return response()->view('cms\viewers\show', compact('viewer'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */









    public function edit($id)
    {
        $viewer = Viewer::findOrfail($id);
        $cities = City::all();
        return response()->view('cms\viewers\edit', compact('viewer', 'cities'));
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

        $validator = validator($request->all(), [
            'email' => 'required ',
            'password' => 'required ',
            // 'image' => "nullable|image|max:2048|mimes:png,jpg,jpeg,pdf"
        ]);

        if (!$validator->fails()) {
            $viewer = Viewer::findOrFail($id);
            $viewer->email = $request->email;
            $viewer->password = Hash::make($request->get('password'));
            $issaved = $viewer->save();

            $user = $viewer->user;
            if (request()->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/viewer', $imageName);

                $user->image = $imageName;
            }

            $user->status = $request->status;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->date = $request->date;
            $user->mobile = $request->mobile;
            $user->last_name = $request->last_name;
            $user->first_name = $request->first_name;
            $user->city_id = $request->city_id;
            $isSaved = $user->save();

            return ['redirect' => route('viewers.index')];

            if ($isSaved) {

                return response()->json(['icon' => 'success', 'title' => 'Created successfully'], 200);
            } else {
                return response()->json(['icon' => 'error', 'title' => 'fails to create'], 400);
            }
            return ['redirect' => route('viewers.index')];
        } else {
            return response()->json(['icon' => 'error', 'title' => $validator->getMessageBag()->first()], 400);
        }

        return response()->view('cms.viewer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */






















    public function destroy($id)
    {
        $viewer = Viewer::findOrfail($id);
        $isdeleted = $viewer->delete();
        return response()->json(['icon' => 'success', 'title' => 'Deleted Successfully'], 200);
    }




    public function truncate()
    {
        Viewer::truncate();

        return redirect()->route("viewers.index");
    }
}
