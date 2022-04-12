<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(5);
        return view('admin.products.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $product=new Product();
        $product->title=$request->title;
        $product->price=$request->price;
        $product->status=$request->status;
        $product->save();
        Session::flash('success','محصول جدید با موفقیت ذخیره شد');
        return redirect('/administrator/products');
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
        $product=Product::findorfail($id);
        return view('admin.products.edit',compact(['product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        $product=Product::findorfail($id);
        $product->title=$request->title;
        $product->price=$request->price;
        $product->status=$request->status;
        $product->save();
        Session::flash('success',' محصول '. $product->title .' با موفقیت ویرایش شد ');
        return redirect('/administrator/products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findorfail($id);
        Session::flash('success',' محصول ' . $product->title .' با موفقیت حذف شد ');
        $product->delete();
        return redirect('/administrator/products');
    }
}
