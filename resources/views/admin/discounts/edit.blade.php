@extends('admin.layout.master')

@section('content')
<section class="content">
    <div class="card">
        <div class="card-header border-transparent col-md-12">

            <h3 class="card-title">ویرایش کد تخفیف
                <span style="color: red">{{$discount->title}}</span>

            </h3>

        </div>

        <div class="box-body ">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="/administrator/discounts/{{$discount->id}}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">

                        <label for="title">عنوان کد تخفیف:  </label>
                        <div class="form-group">
                            <input name="title" id="title" type="text" class="form-control" value="{{$discount->title}}" placeholder="عنوان  کد تخفیف">
                        </div>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <label for="type"> نوع تخفیف:  </label>
                        <div class="form-group">
                            <select id="type" name="type" class="form-control">
                                <option></option>
                                <option value="1" @if($discount->type==1) selected @endif>قیمت (ریال)</option>
                                <option value="0" @if($discount->type==0) selected @endif>درصد</option>
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <label for="amount">مقدار تخفیف:  </label>
                        <div class="form-group">
                            <input name="amount" id="amount" value="{{$discount->amount}}" type="text" class="form-control" placeholder="مقدار  تخفیف">
                            @error('amount')
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
@section('scripts')
    <script>
        $(document).ready(function(){
            var rtype=$("#type").val();
            if(rtype==1){
                $("#amount").attr("placeholder", " ریال ");
            }else if(rtype==0){
                $("#amount").attr("placeholder", " درصد ");
            }


            $("#type").change(function(){
                var type=$("#type").val();
                if(type==1){
                    $("#amount").attr("placeholder", " ریال ");
                }else if(type==0){
                    $("#amount").attr("placeholder", " درصد ");
                }else{
                    $("#amount").attr("placeholder", "مقدار تخفیف");
                }

            });
        });
    </script>
@endsection
