@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Cập nhật sản phẩm</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @foreach ($edit_pro as $key => $value)
        <form class="" action="{{URL::to('/update-product-data')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="ProductID" value="{{$value->ProductID}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Chung</h5>

                    <div class="form-group mb-3">
                        <label for="product-category">Loại sản phẩm <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="cateID" id="product-category">
                          @foreach ($catePro as $key => $valueCate)
                            @if ($valueCate->CategoryID == $value->CategoryID)
                            <option selected value="{{$valueCate->CategoryID}}">{{$valueCate->CategoryName}}</option>
                            @else
                            <option value="{{$valueCate->CategoryID}}">{{$valueCate->CategoryName}}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-category">Thương hiệu sản phẩm <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="brandID" id="product-category">
                          @foreach ($brandPro as $key => $valueBrand)
                            @if ($valueBrand->BrandID == $value->BrandID)
                            <option selected value="{{$valueBrand->BrandID}}">{{$valueBrand->BrandName}}</option>
                            @else
                              <option value="{{$valueBrand->BrandID}}">{{$valueBrand->BrandName}}</option>
                            @endif
                          @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">Tên sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" name="productName" value="{{$value->ProductName}}" class="form-control" placeholder="Tên sản phẩm">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-reference">Giá<span class="text-danger">*</span></label>
                        <input type="text" id="product-reference" name="price" value="{{$value->ProductPrice}}" class="form-control" placeholder="Giá">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-summary">Tóm tắt</label>
                        <textarea class="form-control" name="productContent" id="product-summary"  rows="2" placeholder="Tóm tắt sản phẩm">{{$value->ProductContent}}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-description">Chi tiết sản phẩm<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="productDes" id="product-description" rows="5" placeholder="Please enter description">{{$value->ProductDescrip}}</textarea>
                    </div>

                </div> <!-- end card-box -->
            </div> <!-- end col -->

            <div class="col-lg-6">

                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Hình ảnh sản phẩm</h5>
                    <div class="form-group mb-3">
                        <div class="fallback">
                          <label for="image1">Hình ảnh 1<span class="text-danger"> : </span></label>
                          <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" height="100" width="80" alt=""/>
                          <input  name="image1" type="file" rows="3" id="image1"/>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="fallback">
                          <label for="image2">Hình ảnh 2<span class="text-danger"> : </span></label>
                          <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" height="100" width="80" alt=""/>
                            <input name="image2"  type="file" rows="3" id="image2"/>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="fallback">
                          <label for="image3">Hình ảnh 3<span class="text-danger"> : </span></label>
                          <img src="{{ asset('Upload/Product/'.($value->ProductImage3 && file_exists(public_path('Upload/Product/'.$value->ProductImage3)) ? $value->ProductImage3 : 'no-image.svg')) }}" height="100" width="80" alt=""/>
                            <input name="image3" type="file" rows="3" id="image3"/>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">Số lượng sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" name="quanty" id="product-name" value="{{$value->ProductQuanty}}" class="form-control" placeholder="Số lượng">
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-name">Màu sắc sản phẩm <span class="text-danger">*</span></label>
                        <input type="text" id="product-name" name="color" class="form-control" value="{{$value->ProductColor}}" placeholder="Màu sản phẩm">
                    </div>




                    <div class="text-center mb-3" style="padding-top:185px">
                        <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                        <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Cập nhật</button>
                    </div>



                    <!-- Preview -->
                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                </div> <!-- end col-->

            </div> <!-- end col-->
        </div>
        </form>
      @endforeach
        <!-- end row -->




        <!-- file preview template -->
        <div class="d-none" id="uploadPreviewTemplate">
            <div class="card mt-1 mb-0 shadow-none border">
                <div class="p-2">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                        </div>
                        <div class="col pl-0">
                            <a href="javascript:void(0);" class="text-muted font-weight-bold" data-dz-name></a>
                            <p class="mb-0" data-dz-size></p>
                        </div>
                        <div class="col-auto">
                            <!-- Button -->
                            <a href="#" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                <i class="dripicons-cross"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- container -->

</div> <!-- content -->
@endsection
