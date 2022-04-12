@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header border-transparent col-md-12">

                <h3 class="card-title">ایجاد کد تخفیف جدید</h3>
            </div>

            <div class="box-body ">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                <form action="/administrator/discounts" method="post" >
@csrf
          <label for="title">عنوان تخفیف:  </label>
           <div class="form-group">
               <input name="title" id="title" type="text" class="form-control" placeholder="عنوان  تخفیف">
               @error('title')
               <div class="text-danger">{{ $message }}</div>
               @enderror
               </div>

                    <label for="type"> نوع تخفیف:  </label>
                    <div class="form-group">
                      <select id="type" name="type" class="form-control">
                          <option></option>
                          <option value="1">ثابت (ریال)</option>
                          <option value="0">متغیر (درصد)</option>
                      </select>
                        @error('type')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="amount">مقدار تخفیف:  </label>
                    <div class="form-group">
                        <input name="amount" id="amount" type="text" class="form-control" placeholder="مقدار  تخفیف">
                        @error('amount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

    <button type="submit" class=" pull-left btn btn-success">ذخیره</button>

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
