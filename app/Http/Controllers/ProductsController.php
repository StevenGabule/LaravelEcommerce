<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('product.index')->with('products', Product::orderBy('id', 'desc')->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'name' => 'required|min:6|max:100',
           'price' => 'required|integer',
           'description' => 'required',
           'image' => 'required|image',
       ]);

       $product = new Product();
       $product_image = $request->image;
       $product_image_new_name = time() . $product_image->getClientOriginalName();
       $product_image->move('uploads/products', $product_image_new_name);
       $product->name = $request->name;
       $product->description = $request->description;
       $product->price = $request->price;
       $product->image = 'uploads/products/' . $product_image_new_name;
       $product->save();
       Session::flash('success', 'Product created.');
       return redirect()->route('Products');
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('product.edit')->with('product', Product::find($id));
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
        $this->validate($request, [
            'name' => 'required|min:6|max:100',
            'price' => 'required|integer',
            'description' => 'required'
        ]);

        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $product_image = $request->image;
            $product_image_new_name = time() . $product_image->getClientOriginalName();
            $product_image->move('uploads/products',  $product_image_new_name);
            $product->image = 'uploads/products/' . $product_image_new_name;
            $product->save();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        Session::flash('success', 'Product updated.');
        return redirect()->route('Products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prod = Product::find($id);
        if (file_exists($prod->image)) {
            unlink($prod->image);
        }
        $prod->delete();
        Session::flash('success', 'Product destroyed.');
        return redirect()->route('Products');
    }
}
