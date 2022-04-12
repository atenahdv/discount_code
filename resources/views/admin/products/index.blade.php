@extends('admin.layout.master')

@section('content')

    <section class="content">
    <div class="card">
        <div class="card-header border-transparent col-md-12">

            <div class="box-tools pull-left">
            <a class="btn btn-app" href="{{route('products.create')}}">
                <i class="fa fa-plus"></i>  جدید
            </a>
            </div>
        </div>

        <div class="card-body p-0 col-md-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
                @if(Session::has('warning'))
                    <div class="alert alert-warning">
                        {{session('warning')}}
                    </div>
                @endif
            <h3 class="card-title">  لیست محصولات  </h3>
            <div class="table-responsive rtl">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th class="text-center">شناسه </th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">قیمت (ریال)</th>
                        <th class="text-center">وضعیت نمایش محصول </th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{$product->id}}</td>
                        <td class="text-center">{{$product->title}}</td>
                        <td class="text-center">{{$product->price}} ریال</td>
                        <td class="text-center">
                            @if($product->status==1)
                               فعال
                            @else
                                غیرفعال
                            @endif

                        </td>
                        <td class="text-center">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-warning">ویرایش</a>

                                <form action="{{route('products.destroy' , $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" >حذف</button>
                                </form>
                        </td>

                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    </section>
@endsection
