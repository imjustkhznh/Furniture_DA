@extends('admin_layout')
@section('admin_content')
  <div class="content">

      <!-- Start Content-->
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box">
                      <h4 class="page-title">Thương hiệu sản phẩm</h4>
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
                                  <a href="{{URL::to('/add-brand')}}" class="btn btn-danger mb-2"><i class="feather-plus-circle"></i></a>
                              </div>
                          </div>

                          <div class="table-responsive">
                              <table class="table table-centered table-striped dt-responsive nowrap w-100" id="products-datatable">
                                  <thead>
                                      <tr>
                                          <th>Mã thương hiệu</th>
                                          <th>Tên thương hiệu</th>
                                          <th>Trạng thái</th>
                                          <th style="width: 95px;">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($view_brand as $key => $value)
                                      <tr>

                                          <td class="table-user">
                                              TH-{{$value->BrandID}}
                                          </td>
                                          <td><a href="javascript:void(0);" class="text-body font-weight-semibold">{{$value->BrandName}}</a></td>

                                          <td>
                                            @if ($value->BrandStatus==1)
                                            <a class="badge bg-soft-success text-success" href="{{URL::to('/unactive_brand/id='.$value->BrandID.'')}}" style="font-size: 16px;"><i class="feather-toggle-right"></i></a>
                                              @endif
                                            @if ($value->BrandStatus==0)
                                              <a class="badge bg-soft-danger text-danger" href="{{URL::to('/active_brand/id='.$value->BrandID.'')}}" style="font-size: 16px;"><i class="feather-toggle-left"></i></a>
                                            @endif
                                          </td>

                                          <td>
                                              <a href="{{URL::to('/edit-brand/id='.$value->BrandID.'')}}" class="action-icon"><i class="feather-edit"></i></a>

                                            <a href="{{URL::to('/delete-brand/id='.$value->BrandID.'')}}" class="action-icon"><i class="feather-trash"></i></a>
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
