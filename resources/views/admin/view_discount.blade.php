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
                                  <a href="{{URL::to('/add-discount')}}" class="btn btn-danger mb-2"><i class="feather-plus-circle"></i></a>
                              </div>
                          </div>

                          <div class="table-responsive">
                              <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                  <thead>
                                      <tr>
                                          <th>Mã Khuyến mãi</th>
                                          <th>Tên khuyến mãi</th>
                                          <th>Giá trị khuyến mãi</th>
                                          <th>Mã giảm giá</th>
                                          <th>Bắt đầu</th>
                                          <th>Kết thúc</th>
                                          <th>Trạng thái</th>
                                          <th style="width: 95px;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($discount_list as $key => $value)
                                      <?php $today = date('Y-m-d');
                                      $Batdau = $value->DiscountStart;
                                      $Ketthuc = $value->DiscountEnd;

                                      $today_fm = strtotime($today);
                                      $Batdau_fm = strtotime($Batdau);
                                      $Ketthuc_fm = strtotime($Ketthuc);

                                      ?>

                                      <tr>


                                          <td>
                                              {{$value->DiscountID}}
                                          </td>
                                          <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountName}}</a></td>
                                          @if ($value->DiscountType == 1)
                                            <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountValue}} %</a></td>
                                          @endif
                                          @if ($value->DiscountType == 2)
                                            <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountValue}} VNĐ</a></td>
                                          @endif
                                          <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountCode}}</a></td>
                                          <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountStart}}</a></td>
                                          <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->DiscountEnd}}</a></td>
                                          <td>
                                            @if ($today_fm <= $Batdau_fm)
                                              <a class="badge bg-soft-warning text-warning" style="font-size: 16px;">Sắp diễn ra</a>
                                            @elseif ($today_fm >= $Ketthuc_fm)
                                              <a class="badge bg-soft-danger text-danger"  style="font-size: 16px;">Đã kết thúc</a>
                                            @else
                                              <a class="badge bg-soft-success text-success" style="font-size: 16px;">Đang diễn ra</a>
                                            @endif
                                          </td>
                                          <td>
                                              <a href="{{URL::to('/edit-discount_id='.$value->DiscountID.'')}}" class="action-icon"><i class="feather-edit"></i></a>
                                            <a href="{{URL::to('/delete-discount_id='.$value->DiscountID.'')}}" class="action-icon"><i class="feather-trash"></i></a>
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
