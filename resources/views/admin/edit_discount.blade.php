@extends('admin_layout')
@section('admin_content')
      <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Khuyến mãi</h4>
                            </div>
                        </div>
                    </div>

                    <form action="{{URL::to('/update-discount-data/'.$discount->DiscountID)}}" method="post">
                      {{csrf_field()}}
                      @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul class="mb-0">
                          @foreach ($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                      <div class="row">
                        <div class="col-lg-12">
                            <div class="card-box">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">Sửa khuyến mãi</h5>

                                <div class="form-group mb-3">
                                    <label for="discount-name">Tên khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="discount-name" name="DisName" class="form-control" value="{{old('DisName', $discount->DiscountName)}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="discount-code">Mã khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="discount-code" name="DisCode" class="form-control" value="{{old('DisCode', $discount->DiscountCode)}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="product-category">Hình thức giảm <span class="text-danger">*</span></label>
                                    <select class="form-control select2" name="DisType" id="product-category">
                                        <option value="1" {{old('DisType', $discount->DiscountType) == '1' ? 'selected' : ''}}>Giảm theo %</option>
                                        <option value="2" {{old('DisType', $discount->DiscountType) == '2' ? 'selected' : ''}}>Giảm theo số tiền</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisValue">Giá trị khuyến mãi  <span class="text-danger">*</span></label>
                                    <input type="text" id="DisValue" name="DisValue" class="form-control" value="{{old('DisValue', $discount->DiscountValue)}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisDescrip">Mô tả khuyến mãi <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="DisDescrip" name="DisDescrip" rows="5">{{old('DisDescrip', $discount->DiscountDescript)}}</textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisStart">Ngày bắt đầu  <span class="text-danger">*</span></label>
                                    <input type="date" id="DisStart" name="DisStart" class="form-control" value="{{old('DisStart', $discount->DiscountStart)}}">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="DisEnd">Ngày kết thúc  <span class="text-danger">*</span></label>
                                    <input type="date" id="DisEnd" name="DisEnd" class="form-control" value="{{old('DisEnd', $discount->DiscountEnd)}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <a href="{{URL::to('/discount-manager')}}" class="btn w-sm btn-light waves-effect">Quay lại</a>
                                <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Cập nhật</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
@endsection
