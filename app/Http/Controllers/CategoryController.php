<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('user_id',Auth::user()->name)->get();
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.category.create',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required'
            ]
        );
        $category = new Category();
        $category->name = $request->name;
        $category->regno = $request->regno;
        $category->contact = $request->contact;
        $category->address = $request->address;
        $category->description = $request->description;
        $category->email = $request->email;
        $category->status = $request->status;
        $category->user_id = Auth::user()->name;
        if($request->hasfile('feature'))
        {
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $category->feature = 'feature/' . $newName;

        }
        $category->save();

        $request->session()->flash('alert-success', 'User was successful added!');
        return redirect()->back();
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
        $category = Category::find($id);
        return view('backend.category.edit',compact('category'));
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
        $data = validator(
            [
                'name' => 'required'
            ]
        );
        $category = Category::find($id);
        if(Auth::user()->name == $category->user_id){
        $category->name = $request->name;
        $category->regno = $request->regno;
        $category->contact = $request->contact;
        $category->address = $request->address;
        $category->description = $request->description;
        $category->email = $request->email;
        $category->status = $request->status;
        }
        $category->update();
        $request->session()->flash('alert-success', 'Editing was success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
