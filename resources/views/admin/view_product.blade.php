@extends('admin_layout')
@section('admin_content')
  <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">Sản phẩm</h4>
                  </div>
              </div>
          </div>
          <?php
          $message = Session::get('message');
          if (isset($message)) {
            echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
            Session::put('message',null);
          }else {
            echo '<p class="text-muted mb-4 mt-3"></p>';
        } ?>
          <!-- end page title -->

          <div class="row">
              <div class="col-12">
                  <div class="card">
                      <div class="card-body">
                          <div class="row mb-2">
                              <div class="col-sm-4">
                                  <a href="{{URL::to('/add-product')}}" class="btn btn-danger mb-2"><i class="feather-plus-circle"></i></a>
                              </div>
                          </div>

                          <div class="table-responsive">
                              <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                  <thead>
                                      <tr>
                                          <th>Mã sản phẩm</th>
                                          <th colspan="5">Tên sản phẩm</th>
                                          <th colspan="1">Thương hiệu</th>
                                          <th colspan="1">Danh mục</th>
                                          <th>Hình ảnh</th>
                                          <th colspan="3">Giá</th>
                                          <th>Số lượng</th>
                                          <th>Trạng thái</th>
                                          <th>HOT</th>
                                          <th style="width: 95px;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($view_product as $key => $value)
                                      <tr>

                                          <td class="table-user">
                                              PD{{$value->ProductID}}
                                          </td>


                                          <td colspan="5">
                                            <a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->ProductName}}</a>
                                          </td>

                                          <td>
                                            {{$value->BrandName}}
                                          </td>

                                          <td>
                                            {{$value->CategoryName}}
                                          </td>

                                          <td> <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}"  height="40"> </td>

                                          <td colspan="3">
                                              {{number_format($value->ProductPrice),2}} VND
                                          </td>

                                          <td>
                                              {{$value->ProductQuanty}} PCS
                                          </td>

                                          <td>
                                            @if ($value->ProductStatus==1)
                                            <a class="badge bg-soft-success text-success" href="{{URL::to('/unactive_pro/id='.$value->ProductID.'')}}" style="font-size: 16px;"><i class="feather-toggle-right"></i></a>
                                              @endif
                                            @if ($value->ProductStatus==0)
                                              <a class="badge bg-soft-danger text-danger" href="{{URL::to('/active_pro/id='.$value->ProductID.'')}}" style="font-size: 16px;"><i class="feather-toggle-left"></i></a>
                                            @endif
                                          </td>

                                          <td>
                                            @if ($value->ProductChienluoc==1)
                                            <a class="badge bg-soft-success text-success" href="{{URL::to('/unactive_hot/id='.$value->ProductID.'')}}" style="font-size: 16px;"><i class="feather-toggle-right"></i></a>
                                              @endif
                                            @if ($value->ProductChienluoc==0)
                                              <a class="badge bg-soft-danger text-danger" href="{{URL::to('/active_hot/id='.$value->ProductID.'')}}" style="font-size: 16px;"><i class="feather-toggle-left"></i></a>
                                            @endif
                                          </td>

                                          <td>
                                              <a href="{{URL::to('/edit-product/id='.$value->ProductID.'')}}" class="action-icon"><i class="feather-edit"></i></a>

                                            <a href="{{URL::to('/delete-Product/id='.$value->ProductID.'')}}" class="action-icon"><i class="feather-trash"></i></a>
                                          </td>

                                      </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div> <!-- end card-body-->
                  </div> <!-- end card-->
              </div> <!-- end col -->
          </div>
          <!-- end row -->

      </div> <!-- container -->

  </div> <!-- content -->
@endsection
