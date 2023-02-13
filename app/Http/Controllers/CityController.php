<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;

use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::with('country')->orderBy('id' , 'desc');


        $cities = City::orderBy('id' ,'desc');
        if ($request->get('search')) {
            $moduleIndex = city::where('created_at', 'like', '%' . $request->search . '%');
        }

        if ($request->get('name')) {
            $cities = city::where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->get('street')) {
            $cities = city::where('street', 'like', '%' . $request->street . '%');
        }
        if ($request->get('created_at')) {
            $cities = city::where('created_at', 'like', '%' . $request->created_at . '%');
        }

        $cities = $cities->paginate(5);

        return response()->view('cms.city.index' , compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return response()->view('cms.city.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'street' => 'required|string|min:3|max:20'

        ] , [
            'name.required' => ' الحقل مطلوب' ,
            'street.required' => ' حقل الشارع  مطلوب',

            'name.min' => ' لا يقبل أقل من 3 حروف',

            'name.max' => '  لا يقبل أكثر من 20 حرف' ,
            'street.min' => ' لا يقبل أقل من 3 حروف' ,
            'street.max' => '  لا يقبل أكثر من 20 حرف' ,
        ]);
        $cities = new City();
        // $cities->name = $request->('name');
        // $cities->name = $request->input('name');
        $cities->name = $request->get('name');
        $cities->street = $request->get('street');
        $cities->country_id = $request->get('country_id');

        $isSaved = $cities->save();
        session()->flash('message' , $isSaved ? "Created is Successfully" : "Created is Failed");

        // return redirect()->back();
        return redirect()->route('cities.index');

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
        $cities = City::findOrFail($id);
        return response()->view('cms.city.edit' , compact('cities'));
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
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'street' => 'nullable|string|min:3|max:20'

        ] , [
            'name.required' => ' الحقل مطلوب' ,
            'street.required' => ' حقل الشارع  مطلوب',

            'name.min' => ' لا يقبل أقل من 3 حروف',

            'name.max' => '  لا يقبل أكثر من 20 حرف' ,

            'street.min' => ' لا يقبل أقل من 3 حروف' ,

            'street.max' => '  لا يقبل أكثر من 20 حرف' ,

        ]);
        $cities = City::findOrFail($id);
        // $cities->name = $request->('name');

        // $cities->name = $request->input('name');

        $cities->name = $request->get('name');
        $cities->street = $request->get('street');
        $isUpdate = $cities->save();
        session()->flash('message' , $isUpdate ? "Updated is Successfully" : "Updated is Failed");

        // return redirect()->back();
        return redirect()->route('cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cities = City::destroy($id);

        return redirect()->route('cities.index');
        // return response()->json(['Delete is Successfully']);
    }
}
