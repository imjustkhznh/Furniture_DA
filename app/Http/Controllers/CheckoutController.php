<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Commune;
use App\Models\District;
use App\Models\Shipmoney;
use Cart;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class CheckoutController extends Controller
{
    public function go_checkout($cusID)
    {
        $city = City::orderby('matp', 'ASC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $info_custom = DB::table('tbl_customer')->where('CustomerID', $cusID)->get();

        return view('pages.checkout.check-out')->with('info_custom', $info_custom)->with('Product_all', $Product_all)->with(compact('city'));
    }

    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $out_put = '';
            if ($data['action'] == 'city') {
                $select_district = District::where('matp', $data['matp'])->orderby('maqh', 'ASC')->get();
                $out_put .= '<option value="0">---Chọn Quận / Huyện ---</option>';
                foreach ($select_district as $key => $district) {
                    $out_put .= '<option value="'.$district->maqh.'">'.$district->name_huyen.'</option>';
                }
            } else {
                $select_commune = Commune::where('maqh', $data['matp'])->orderby('xaid', 'ASC')->get();
                $out_put .= '<option value="0">---Chọn Xã / Thị trấn ---</option>';
                foreach ($select_commune as $key => $com) {
                    $out_put .= '<option value="'.$com->xaid.'">'.$com->name_xa.'</option>';
                }
            }
        }
        echo $out_put;
    }

    public function order(Request $request)
    {
        if (isset($request->change_ship)) {
            Session::forget('ShipMon');
            Session::put('message', 'Vui lòng chọn lại thông tin địa chỉ để lấy phí ship');

            return redirect()->back();
        }
        if (isset($request->caculator_ship)) {
            $City_select = $request->City;
            $District_select = $request->District;
            $Com_select = $request->Commune;
            if ($City_select == 0 || $District_select == 0 || $Com_select == 0) {
                Session::put('message', 'Vui lòng chọn thông tin địa chỉ để lấy phí ship');

                return redirect()->back();
            } else {
                $data = [];
                $data['ShippingName'] = $request->FirstName.' '.$request->Name;
                $data['ShippingEmail'] = $request->Email;
                $data['ShippingPhone'] = $request->Phone;
                $data['ShippingCity'] = $request->City;
                $data['ShippingDistrict'] = $request->District;
                $data['ShippingCommune'] = $request->Commune;
                $data['ShippingAddress'] = $request->Address;
                $ShippingId = DB::table('tbl_shipping')->insertGetId($data);
                Session::put('ShippingID', $ShippingId);

                $feeship = Shipmoney::where('matp', $City_select)->where('maqh', $District_select)->where('xaid', $Com_select)->get();
                if ($feeship->count() > 0) {
                    foreach ($feeship as $key => $value) {
                        Session::put('message', 'Đã lưu địa chỉ và tính phí ship vui lòng chọn phương thức thanh toán');
                        Session::put('ShipMon', $value->ship_money);
                        Session::save();
                    }
                } else {
                    Session::put('message', 'Đã lưu địa chỉ và tính phí ship vui lòng chọn phương thức thanh toán');
                    Session::put('ShipMon', '35000');
                    Session::save();
                }

                return redirect()->back();
            }
        } else {
            if ($request->Accept == 'OK') {
                $data_cart = Cart::getContent();
                // Thêm vào bảng tbl_order
                $data_Order = [];
                $data_Order['CustomerID'] = $request->CustomerID;
                $data_Order['ShippingID'] = Session::get('ShippingID');
                $data_Order['OrderTotal'] = $request->Total;
                if (Session::get('discount')) {
                    $data_Order['DiscountCode'] = $request->DiscountCode;
                } else {
                    $data_Order['DiscountCode'] = 'Không sử dụng';
                }
                $data_Order['OrderStatus'] = 0;
                $data_Order['OrderDate'] = date('Y-m-d');
                $data_Order['PaymentMethod'] = $request->payment_method;
                $data_Order['PaymentStatus'] = 0;
                if (Session::get('discount')) {
                    $data_Order['Order_DisCode'] = $request->DiscountCode;
                    $data_Order['Order_DisValue'] = $request->DiscountValue;
                } else {
                    $data_Order['Order_DisCode'] = 'Không';
                    $data_Order['Order_DisValue'] = 0;
                }
                if (Session::get('ShipMon')) {
                    $data_Order['Order_Ship'] = $request->Ship;
                }
                $OrderId = DB::table('tbl_order')->insertGetId($data_Order);
                Session::put('OrderID', $OrderId);
                // Thêm vào hóa đơn chi tiết
                $data_BillDT = [];
                foreach ($data_cart as $key => $value) {
                    $data_BillDT['OrderID'] = $OrderId;
                    $data_BillDT['ProductID'] = $value->id;
                    $data_BillDT['ProductName'] = $value->name;
                    $data_BillDT['ProductPrice'] = $value->price;
                    $data_BillDT['ProductQuanty'] = $value->quantity;
                    $detail_bill = DB::table('tbl_bill_detail')->insertGetId($data_BillDT);
                    Session::put('OrderDetail', $detail_bill);
                }

                return Redirect::to('/completed-checkout');
            } else {
                Session::put('message', 'Vui lòng chấp thuận điều khoản mua hàng');
                Session::save();

                return redirect()->back();
            }
        }
    }

    public function completed()
    {
        $Product_all = DB::table('tbl_product')->get();
        $info_ship = DB::table('tbl_shipping')->where('ShippingID', Session::get('ShippingID'))->get();
        $info_order = DB::table('tbl_bill_detail')->where('OrderID', Session::get('OrderID'))->get();
        $info_order_tbl = DB::table('tbl_order')->where('OrderID', Session::get('OrderID'))->get();
        Cart::clear();
        Session::forget('Cart');

        return view('pages.checkout.order_complete')->with('info_ship', $info_ship)->with('info_order', $info_order)->with('info_order_tbl',$info_order_tbl)->with('Product_all', $Product_all);
    }
}
