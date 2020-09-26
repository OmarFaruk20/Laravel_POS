<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        // die($this->data['products']);
        return view('product.product', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['category'] = Category::ArrayForSelect();
        $this->data['mode']         = 'create';
        $this->data['headline']     = 'Add New Products';
        return view('product.form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $request->all();
        Product::create($data);
        return Redirect('/products')->with('message', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::all();
        // $this->data['category'] = Category::all();
        return view('product.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['product']      = Product::findOrFail($id);
        $this->data['category']     = Category::ArrayForSelect();
        $this->data['mode']         = 'edit';
        return view('product.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCreateRequest $request, $id)
    {
        $data = $request->all();

        $product                = Product::find($id);
        $product->category_id   = $data['category_id'];
        $product->title         = $data['title'];
        $product->description   = $data['description'];
        $product->cost_price    = $data['cost_price'];
        $product->price         = $data['price'];
        $product->save();

        return Redirect('/products')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return Redirect('/products')->with('message', 'Products Deleted Successfully');

    }
}
