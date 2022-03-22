<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\TailorRating;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class ShowTAilorRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $category = Category::all();
        // $ratings = TailorRating::with('category',)->get();
        // $rating_sum = TailorRating::with('category',)->sum('rating');
        // $rating_value = number_format( $rating_sum/$ratings->count());

        $rating = TailorRating::groupBy('category_id',)->selectRaw('avg(rating) as rating,category_id')->get();
            //   $ratings =TailorRating::groupBy('category_id',)->selectRaw('avg(rating) as rating,category_id')->join('product','product.category_id','=','rating.category_id')->get();
        // $ratings = Category::with('products')->join($rating);
        // $rating = 2.4;
        return response()->json($rating);

        // return response()->json($rating_value);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rating = Category::with('rating')->find($id);
        return response()->json($rating);
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
        //
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
