@extends('admin_layout')
@section('admin_content')
  <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">Đơn hàng</h4>
                  </div>
              </div>
          </div>
          <?php
          $message = Session::get('message');
          if (isset($message)) {
            echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
            Session::put('message',null);
          }else {
            echo '<p class="text-muted mb-4 mt-3">Nhấn để xem chi tiết.</p>';
        } ?>
          <!-- end page title -->

                                  <div class="row">
                                      <div class="col-sm-12">
                                          <div class="card-box">

                                            <div class="row mb-2">
                                                <div class="col-sm-4">
                                                    <a href="{{URL::to('/add-category')}}" class="btn btn-danger mb-2"><i class="feather-plus-circle"></i></a>
                                                </div>
                                            </div>
                                              <table data-toggle="table"
                                                     data-search="true"
                                                     data-show-refresh="true"
                                                     data-sort-name="id"
                                                     data-page-list="[5, 10, 20]"
                                                     data-page-size="5"
                                                     data-pagination="true" data-show-pagination-switch="true" class="table-borderless">
                                                  <thead class="thead-light">
                                                  <tr>
                                                      <th data-field="id" data-sortable="true" data-formatter="invoiceFormatter">Mã Đơn hàng</th>
                                                      <th data-field="name" data-sortable="true">Tên người đặt</th>
                                                      <th data-field="date" data-sortable="true" data-formatter="dateFormatter">Ngày đặt</th>
                                                      <th data-field="amount" data-align="center" data-sortable="true" data-sorter="priceSorter">Tổng tiền</th>
                                                      <th data-field="status" data-align="center" data-sortable="true" data-formatter="statusFormatter">Trạng thái</th>
                                                      <th style="width: 95px;">Action</th>

                                                  </tr>
                                                  </thead>


                                                  <tbody>
                                                    @foreach ($Order_data as $key => $value)
                                                  <tr>
                                                      <td>ĐH-{{$value->OrderID}}</td>
                                                      <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->CustomerName}}</a></td>
                                                      <td>22 Jun 2017</td>
                                                      <td>{{$value->OrderTotal}} VNĐ</td>
                                                      <td>
                                                          @if ($value->OrderStatus==1)
                                                          <a class="badge bg-soft-success text-success" href="{{URL::to('/unaccept_order/id='.$value->OrderID.'')}}" style="font-size: 16px;">Đã duyệt</i></a>
                                                            @endif
                                                          @if ($value->OrderStatus==0)
                                                            <a class="badge bg-soft-warning text-warning" href="{{URL::to('/accept_order/id='.$value->OrderID.'')}}" style="font-size: 16px;">Chờ xử lí ...</i></a>
                                                          @endif
                                                        </td>
                                                      <td>
                                                          <a href="{{URL::to('/view-detail-order/id='.$value->OrderID.'')}}" class="action-icon" title="Xem chi tiết"><i class="feather-eye"></i></a>

                                                        <a href="{{URL::to('/delete-order/id='.$value->OrderID.'')}}" class="action-icon" title="Xóa đơn hàng"><i class="feather-trash"></i></a>
                                                      </td>
                                                  </tr>
                                                    @endforeach

                                                  </tbody>
                                              </table>
                                          </div> <!-- end card-box-->
                                      </div> <!-- end col-->
                                  </div>
                                  <!-- end row-->

      </div> <!-- container -->

  </div> <!-- content -->
@endsection
