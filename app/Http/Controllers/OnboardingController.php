<?php

namespace App\Http\Controllers;

use App\Models\Onborading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onboarding = Onborading::all();
        return view('backend.onboarding.index',compact('onboarding'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.onboarding.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $onboarding = new Onborading();
        $onboarding->name = $request->name;
        if($request->hasfile('feature'))
        {
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $onboarding->feature = 'feature/' . $newName;

        }
        $onboarding->save();
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
        $onboarding =  Onborading::find($id);
        return view('backend.onboarding.edit',compact('onboarding'));
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
        $onboarding =  Onborading::find($id);
        $onboarding->name = $request->name;

        if($request->hasfile('feature'))
        {
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $onboarding->feature = 'feature/' . $newName;

        }

        $onboarding->update();
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
