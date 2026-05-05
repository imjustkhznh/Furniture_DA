@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Quản lý phí vận chuyển</h4>
                </div>
            </div>
        </div>
        <?php
        $message = Session::get('message');
        if (isset($message)) {
            echo '<p class="text-muted mb-4 mt-3"><strong>Thông báo: </strong>'.$message.'</p>';
            Session::put('message', null);
        }
        ?>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i>Thêm phí vận chuyển</button>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap table-striped" id="products-datatable">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Tỉnh / Thành Phố</th>
                                        <th>Quận / Huyện</th>
                                        <th>Xã / Phường</th>
                                        <th>Phí ship</th>
                                        <th style="width: 220px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($ship_money as $key => $value)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->name_city}}</a>
                                        </td>
                                        <td>
                                            {{$value->name_huyen}}
                                        </td>
                                        <td>
                                            {{$value->name_xa}}
                                        </td>
                                        <td>{{number_format($value->ship_money)}} VNĐ</td>
                                        <td>
                                            <form action="{{URL::to('/update-feeship/'.$value->feeID)}}" method="post" class="d-inline-block">
                                                @csrf
                                                <input type="number" min="0" step="1000" name="ship_money" value="{{$value->ship_money}}" class="form-control d-inline-block" style="width:120px;">
                                                <button type="submit" class="btn btn-sm btn-info">Lưu</button>
                                            </form>
                                            <a href="{{URL::to('/delete-feeship/'.$value->feeID)}}" class="btn btn-sm btn-danger" onclick="return confirm('Xóa dòng phí ship này?')">Xóa</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <ul class="pagination pagination-rounded justify-content-end mb-0">
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                            <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
@endsection
