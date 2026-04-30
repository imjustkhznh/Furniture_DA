@extends('admin_layout')
@section('admin_content')
      <div class="content">
                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Khuyến mãi</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <form class="" action="{{URL::to('/add-discount-data')}}" method="post">
                      {{csrf_field()}}
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Thêm khuyến mãi</h5>
                                <?php
                                $message = Session::get('message');
                                if (isset($message)) {
                                  echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
                                  Session::put('message',null);
                                }else {
                                  echo '<p class="text-muted mb-4 mt-3">.</p>';
                              } ?>

                                <div class="form-group mb-3">
                                    <label for="discount-name">Tên khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="discount-name" name="DisName" class="form-control" placeholder="Tên khuyến mãi">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="discount-code">Mã khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="discount-code" name="DisCode" class="form-control" placeholder="Mã khuyến mãi">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="product-category">Hình thức giảm <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="DisType" id="product-category">
                                        <option value="1">Giảm theo %</option>
                                        <option value="2">Giảm theo số tiền</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisValue">Giá trị khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="DisValue" name="DisValue" class="form-control" placeholder="Giá trị khuyến mãi">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisDescrip">Mô tả khuyến mãi <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="DisDescrip" name="DisDescrip" rows="5" placeholder="Nhập mô tả khuyến mãi"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisStart">Ngày bắt đầu  <span class="text-danger">*</span></label>
                                    <input type="date" id="DisStart" name="DisStart" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisEnd">Ngày kết thúc  <span class="text-danger">*</span></label>
                                    <input type="date" id="DisEnd" name="DisEnd" class="form-control">
                                </div>


                            </div> <!-- end card-box -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                                <button type="submit" name="add-category-product" class="btn w-sm btn-success waves-effect waves-light">Thêm</button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    </form>
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
