@extends('admin.layout.master')

@section('content')

    <section class="content">
    <div class="card">
        <div class="card-header border-transparent col-md-12">

            <div class="box-tools pull-left">
            <a class="btn btn-app" href="{{route('discounts.create')}}">
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
            <h3 class="card-title"> کدهای تخفیف  </h3>
            <div class="table-responsive rtl">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th class="text-center">کد تخفیف</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discounts as $discount)
                    <tr>
                        <td class="text-center">{{$discount->code}}</td>
                        <td class="text-center">{{$discount->title}}</td>
                        <td class="text-center">
                            <a href="{{route('discounts.edit',$discount->id)}}" class="btn btn-warning">ویرایش</a>
                            <a href="{{route('discounts.destroy', $discount->id)}}" class="btn btn-danger" onclick="return confirm('آیا از حذف کد تخفیف مطمعئن هستید؟')">حذف</a>
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
