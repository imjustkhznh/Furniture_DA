@extends('admin_layout')
@section('admin_content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Chi tiết đơn</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Sản phẩm</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($Product as $value)
                                    <tr>
                                        <td>{{$value->ProductName}}</td>
                                        <td><img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" alt="product-img" height="32"></td>
                                        <td>{{$value->ProductQuanty}} PCS</td>
                                        <td>{{$value->ProductPrice}} VND</td>
                                        <td>{{$value->ProductPrice * $value->ProductQuanty}} VND</td>
                                    </tr>
                                @endforeach




                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Phí vận chuyển :</th>
                                        <td>{{$Order_detail->Order_Ship}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Mã giảm giá :</th>
                                        <td>{{$Order_detail->Order_DisCode}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Giá trị giảm :</th>
                                        <td>{{$Order_detail->Order_DisValue}}</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Ngày đặt hàng :</th>
                                        <td>{{$Order_detail->OrderDate}}</td>
                                    </tr>


                                    <tr>
                                        <th scope="row" colspan="4" class="text-right">Tổng tiền + Thuế :</th>
                                        <td><div class="font-weight-bold">{{$Order_detail->OrderTotal}} VNĐ</div></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Địa chỉ gửi hàng</h4>

                        <h5 class="font-family-primary font-weight-semibold">{{$Order_detail->CustomerName}}</h5>

                        <p class="mb-2"><span class="font-weight-semibold mr-2">Địa chỉ :</span> {{$Order_detail->ShippingAddress}}</p>
                        <p class="mb-2"><span class="font-weight-semibold mr-2">Số điện thoại :</span> {{$Order_detail->ShippingPhone}}</p>

                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Thanh toán</h4>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-2"><span class="font-weight-semibold mr-2">Phương thức thanh toán:</span>{{$Order_detail->PaymentMethod}}</p>
                                <p class="mb-1"><span class="font-weight-semibold">Mã Đơn :</span>HĐ-{{$Order_detail->OrderID}}</p>
                                @if ($Order_detail->PaymentStatus == 1)
                                  <p class="mb-0"><span class="font-weight-semibold">Thanh toán :</span> Đã thanh toán</p>
                                @endif
                                @if ($Order_detail->PaymentStatus == 0)
                                  <p class="mb-0"><span class="font-weight-semibold">Thanh toán :</span> Chưa thanh toán</p>
                                @endif

                                <p></p>
                            </li>
                        </ul>

                    </div>
                </div>
            </div> <!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->
@endsection
