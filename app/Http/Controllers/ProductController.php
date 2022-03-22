<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('user_id',Auth::user()->name)->get()->all();
        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('user_id',Auth::user()->name)->get();
        return view('backend.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'SKU' => 'required',
            'name' => 'required',




        ]);
        $product = new Product();

        $product->user_id = Auth::user()->name;
        $product->SKU = $request->SKU;
        $product->name = $request->name;
        $product->sp = $request->sp;

        // $product->sp = $request->sp;
        if($request->hasFile('image')){
            $file = $request->image;
            $newName = time() . $file->getClientOriginalName();
            $file->move('image',$newName);
            $product->image = 'image/' . $newName;

        }
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->save();
        // if($request->hasFile('images')){
        //     foreach($request->images as $image){
        //         $productImage = new ProductImage();
        //         $newName = time() . $image->getClientOriginalName();
        //         $image->move('images',$newName);
        //         $productImage->name = 'images/' . $newName;
        //         $productImage->product_id = $product->id;
        //         $productImage->user_id = Auth::user()->name;
        //         $productImage->save();
        //     }

        // }
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);

        return view('backend.products.edit',compact('product','categories',));
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

        $product = Product::find($id);
        if(Auth::user()->name == $product->user_id){
        $product->SKU = $request->SKU;
        $product->name = $request->name;

        $product->sp = $request->sp;
        if($request->hasFile('feature')){
            $file = $request->feature;
            $newName = time() . $file->getClientOriginalName();
            $file->move('feature',$newName);
            $product->feature = 'feature/' . $newName;

        }
        $product->category_id = $request->category_id;
        $product->description = $request->description;

        // if($request->hasFile('images')){
        //     foreach($request->images as $image){
        //         $productImage = ProductImage::find($id) ;
        //         $newName = time() . $image->getClientOriginalName();
        //         $image->move('images',$newName);
        //         $productImage->name = 'images/' . $newName;
        //         $productImage->product_id = $product->id;
        //         $productImage->update();
        //     }


        // }
        }
        $product->update();
        $request->session()->flash('alert-success', 'Editing was successful ');
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
