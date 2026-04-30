@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Quản lí slider</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title">Slider</h4>
                    <div class="mb-2">
                        <div class="row">
                              <div class="col-sm-4">
                                  <a href="{{URL::to('/add-slide')}}" class="btn btn-danger mb-2"><i class="feather-plus-circle"></i></a>
                              </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                            <thead>
                            <tr>
                                <th data-toggle="true">Tên Slide</th>
                                <th data-toggle="true">Hình ảnh</th>
                                <th data-hide="phone">Tiêu đề</th>
                                <th data-hide="phone, tablet">Chi tiết</th>
                                <th data-hide="phone, tablet">Trạng thái</th>
                                <th data-hide="phone, tablet">Sửa/Xóa</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($slide_list as $key => $value)
                            <tr>
                                <td>{{$value->SlideName}}</td>
                                <td><img src="{{ $value->SlideImage ? asset('Upload/Slide/'.$value->SlideImage) : '' }}" height="100"></td>
                                <td>{{$value->SlideTitle}}</td>
                                <td>{{$value->SlideContent}}</td>
                                @if ($value->SlideStatus == 1)
                                  <td><span class="badge label-table badge-success">Hiển thị</span></td>
                                @endif
                                @if ($value->SlideStatus == 0)
                                  <td><span class="badge label-table badge-danger">Đã ẩn</span></td>
                                @endif
                                <td>
                                  <a href="{{URL::to('/edit-slide_id='.$value->SlideID.'')}}" class="action-icon"><i class="feather-edit"></i></a>

                                  <a href="{{URL::to('/delete-slide_id='.$value->SlideID.'')}}" class="action-icon"><i class="feather-trash"></i></a>
                              </td>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="active">
                                <td colspan="6">
                                    <div class="text-right">
                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
