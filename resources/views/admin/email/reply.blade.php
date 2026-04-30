@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
          <div class="col-12">
              <div class="page-title-box">
                  <h4 class="page-title">Trả lời mail</h4>
              </div>
          </div>
      </div>
      <!-- end page title -->

        <!-- Right Sidebar -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <!-- Left sidebar -->
                    <div class="inbox-leftbar">

                        <a href="email-compose.html" class="btn btn-danger btn-block waves-effect waves-light">Viết mail</a>

                        <div class="mail-list mt-4">
                            <a href="javascript: void(0);" class="text-danger font-weight-bold"><i class="feather-inbox mr-2"></i>Hộp thư<span class="badge badge-soft-danger float-right ml-2">7</span></a>
                            <a href="javascript: void(0);"><i class="feather-star mr-2"></i>Dấu sao</a>
                            <a href="javascript: void(0);"><i class="feather-clock mr-2"></i>Đã nhận</a>
                            <a href="javascript: void(0);"><i class="feather-align-justify mr-2"></i>Nháp<span class="badge badge-soft-info float-right ml-2">32</span></a>
                            <a href="javascript: void(0);"><i class="feather-send mr-2"></i>Đã gửi</a>
                            <a href="javascript: void(0);"><i class="feather-trash mr-2"></i>Thùng rác</a>
                            <a href="javascript: void(0);"><i class="feather-tag mr-2"></i>Quan trọng</a>
                            <a href="javascript: void(0);"><i class="feather-warning mr-2"></i>Spam</a>
                        </div>
                    </div>
                    <!-- End Left sidebar -->

                    <div class="inbox-rightbar">

                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-light waves-effect"><i class="feather-archive font-18"></i></button>
                          <button type="button" class="btn btn-sm btn-light waves-effect"><i class="feather-alert-octagon font-18"></i></button>
                          <button type="button" class="btn btn-sm btn-light waves-effect"><i class="feather-delete font-18"></i></button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                              <i class="feather-folder font-18"></i>
                              <i class="feather-chevron-down"></i>
                          </button>
                      </div>
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                              <i class="feather-tag font-18"></i>
                              <i class="feather-chevron-down"></i>
                          </button>
                      </div>

                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">
                              <i class="feather-more-horizontal font-18"></i>
                              <i class="feather-chevron-down"></i>
                          </button>
                      </div>

                        <div class="mt-4">
                            <form action="{{URL::to('/send-email-admin')}}" method="post">
                              @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="Cusemail" placeholder="Đến" value="{{$reply->ContactEmail}}">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control"  name="Subject" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="summernote" name="Message">

                                    </textarea>
                                </div>

                                <div class="form-group m-b-0">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="feather-save"></i></button>
                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="feather-delete"></i></button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"> <span>Gửi</span> <i class="mdi mdi-send ml-2"></i> </button>
                                    </div>
                                </div>

                            </form>
                        </div> <!-- end card-->

                    </div>
                    <!-- end inbox-rightbar-->

                    <div class="clearfix"></div>
                </div>

            </div> <!-- end Col -->

        </div><!-- End row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
