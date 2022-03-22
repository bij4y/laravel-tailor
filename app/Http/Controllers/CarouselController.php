<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::all();
        return view('backend.carousel.index',compact('carousel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.carousel.create');
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
                'feature' => 'required'
            ]
        );
        $carousel = new Carousel();
        if($request->hasFile('feature')){
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $carousel->feature = 'feature/' . $newName;

        }
        $carousel->save();
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
        $carousel = Carousel::find($id);
        return view('backend.carousel.edit',compact('carousel'));
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

        $carousel = Carousel::find($id);
        if($request->hasFile('feature')){
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $carousel->feature = 'feature/' . $newName;

        }
        $carousel->update();
        $request->session()->flash('alert-success', 'User was successful added!');
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
