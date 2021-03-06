<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscountRequest;
use Illuminate\Support\Facades\Session;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $discounts=Discount::paginate(5);
      return view('admin.discounts.index',compact(['discounts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * generate unique discount code and check in db for discounts table
     * @return string
     */

    public function generateDcode(){
        $number=mt_rand(1000,9999999);
        if($this->checkCODE($number)){
            return  $this->generateDcode();
        }
        return (string)$number;
    }
    public function checkCODE($number){
        return Discount::where('code',$number)->exists();
    }

    public function store(CreateDiscountRequest $request)
    {
        $discount=new Discount();
        $discount->code = $this->generateDcode();
        $discount->title = $request->input('title');
        $discount->type = $request->input('type');
        $discount->amount = $request->input('amount');
        $discount->status = 1;
        $discount->save();
        Session::flash('success','کد تخفیف با موفقیت ذخیره شد');
        return redirect('/administrator/discounts');
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
        $discount=Discount::findorfail($id);
        return view('admin.discounts.edit',compact(['discount']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDiscountRequest $request, $id)
    {
        $discount=Discount::findorfail($id);
        $discount->title=$request->title;
        $discount->type=$request->type;
        $discount->amount=$request->amount;
        if($discount->status==1){
            $discount->save();
            Session::flash('success',' کد تخفیف '. $discount->title .' با موفقیت ویرایش شد ');
        }else
            Session::flash('warning','امکان ویرایش کد تخفیف '. $discount->title .' به دلیل استفاده وجود ندارد ');
        return redirect('/administrator/discounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount=Discount::findorfail($id);
        Session::flash('success',' کد تخفیف  ' . $discount->title .' با موفقیت حذف شد ');
        $discount->delete();
        return redirect('/administrator/discounts');
    }
}
