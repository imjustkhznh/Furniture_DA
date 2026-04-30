@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Inbox</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">

            <!-- Right Sidebar -->
            <div class="col-12">
                <div class="card-box">
                    <!-- Left sidebar -->
                    <div class="inbox-leftbar">

                        <a href="{{URL::to('/write-mail')}}" class="btn btn-danger btn-block waves-effect waves-light">Viết mail</a>

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

                        <div class="mt-3">
                            <ul class="message-list">

                              @foreach ($mail_list as $key => $value)
                                <li class="unread">
                                    <div class="col-mail col-mail-1">
                                        <div class="checkbox-wrapper-mail">
                                            <i class="feather-trash"></i>
                                        </div>
                                        <span class="star-toggle feather-star text-warning"></span>
                                        <a href="#" class="title">{{$value->ContactName}}</a>
                                    </div>
                                    <div class="col-mail col-mail-2">
                                        <a href="{{URL::to('/read-mail_id='.$value->ContactID.'')}}" class="subject">{{$value->ContactName}} &nbsp;&ndash;&nbsp;
                                            <span class="teaser">{{$value->ContactSubject}}.</span>
                                        </a>
                                        <div class="date">{{$value->created_at}}</div>
                                    </div>
                                </li>
                                @endforeach




                            </ul>
                        </div>
                        <!-- end .mt-4 -->

                        <div class="row">
                            <div class="col-7 mt-1">
                                
                            </div> <!-- end col-->
                            <div class="col-5">
                                <div class="btn-group float-right">
                                    <button type="button" class="btn btn-light btn-sm"><i class="feather-chevron-left"></i></button>
                                    <button type="button" class="btn btn-info btn-sm"><i class="feather-chevron-right"></i></button>
                                </div>
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
                    </div>
                    <!-- end inbox-rightbar-->

                    <div class="clearfix"></div>
                </div> <!-- end card-box -->

            </div> <!-- end Col -->
        </div><!-- End row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
