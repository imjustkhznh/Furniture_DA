@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Slide</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form class="" action="{{URL::to('/add-slide-data')}}" method="post" enctype="multipart/form-data">
          @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Thêm slide</h5>
                    <?php
                    $message = Session::get('message');
                    if (isset($message)) {
                      echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
                      Session::put('message',null);
                    }else {
                      echo '<p class="text-muted mb-4 mt-3">.</p>';
                  } ?>
                    <div class="form-group mb-3">
                        <label for="slide-name">Tên Slide <span class="text-danger">*</span></label>
                        <input type="text" id="slide-name" name="SlideName" class="form-control" placeholder="Tên sản phẩm">
                    </div>

                    <div class="form-group mb-3">
                        <div class="fallback">
                          <label for="image">Hình ảnh 1<span class="text-danger"> : </span></label>
                            <input  name="SlideImage" type="file" rows="3" id="image"/>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Slide-summary">Tiêu đề</label>
                        <textarea class="form-control" name="SlideContent" id="Slide-summary" rows="2" placeholder="Tóm tắt sản phẩm"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="Slide-description">Nội dung hiển thị<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="SlideDes" id="Slide-description" rows="5" placeholder="Please enter description"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2">Trạng thái<span class="text-danger">*</span></label>
                        <br/>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio1" value="1" name="SlideStatus" checked="">
                            <label for="inlineRadio1"> Hiển thị </label>
                        </div>
                        <div class="radio form-check-inline">
                            <input type="radio" id="inlineRadio2" value="0" name="SlideStatus">
                            <label for="inlineRadio2"> Ẩn </label>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                        <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Thêm</button>
                    </div>

                </div> <!-- end card-box -->
                    <!-- Preview -->
                    <div class="dropzone-previews mt-3" id="file-previews"></div>

                </div> <!-- end col-->

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
