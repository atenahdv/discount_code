@extends('admin.layout.master')

@section('content')
    <section class="content">
        <div class="card">
            <div class="card-header border-transparent col-md-12">

                <h3 class="card-title">ایجاد محصول جدید</h3>
            </div>

            <div class="box-body ">
                <div class="row">
                <div class="col-md-6 col-md-offset-3">
                <form action="/administrator/products" method="post" >
@csrf
          <label for="title">عنوان محصول:  </label>
           <div class="form-group">
               <input name="title" id="title" type="text" class="form-control" placeholder="عنوان  محصول">
               @error('title')
               <div class="text-danger">{{ $message }}</div>
               @enderror
               </div>

                    <label for="price"> قیمت محصول:  </label>
                    <div class="form-group">
                        <input name="price" id="price" type="text" class="form-control" placeholder="قیمت محصول">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <label for="status"> وضعیت نمایش محصول :  </label>
                    <div class="form-group">
                        <select id="status" name="status" class="form-control">
                            <option></option>
                            <option value="1"> فعال</option>
                            <option value="0">غیرفعال</option>
                        </select>
                        @error('status')
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
