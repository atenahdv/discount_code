@extends('admin.layout.master')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header border-transparent col-md-12">

            <h3 class="card-title">ویرایش محصول
                <span style="color: red">{{$product->title}}</span>

            </h3>

        </div>

        <div class="box-body ">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/administrator/products/{{$product->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <label for="title">عنوان محصول :  </label>
                        <div class="form-group">
                            <input name="title" id="title" type="text" class="form-control" value="{{$product->title}}" placeholder="عنوان محصول">
                        </div>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror



                        <label for="amount">مقدار تخفیف:  </label>
                        <div class="form-group">
                            <input name="price" id="price" value="{{$product->price}}" type="text" class="form-control" placeholder="مقدار  تخفیف">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="status"> وضعیت نمایش محصول :  </label>
                        <div class="form-group">
                            <select id="status" name="status" class="form-control">
                                <option></option>
                                <option value="1" @if($product->status==1) selected @endif>فعال</option>
                                <option value="0" @if($product->status==0) selected @endif>غیرفعال </option>
                            </select>
                            @error('status')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class=" pull-left btn btn-success">ویرایش</button>

                    </form>

                </div>
            </div>
        </div>



    </div>
</section>
@endsection
