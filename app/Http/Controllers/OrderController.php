<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Session;

class OrderController extends Controller
{
    public function AuthLogin()
    {
        $adminID = Session::get('id_admin');
        if ($adminID) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function order_manager()
    {
        $this->AuthLogin();

        $Order_data = DB::table('tbl_order')->join('tbl_customer', 'tbl_customer.CustomerID', '=', 'tbl_order.CustomerID')->select('tbl_order.*', 'tbl_customer.CustomerName')->get();

        return view('admin.order')->with('Order_data', $Order_data);
    }

    public function delete_order($OdID)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('OrderID', $OdID)->delete();
        DB::table('tbl_bill_detail')->where('OrderID', $OdID)->delete();
        Session::put('message', 'Xóa thành công');

        return Redirect::to('/order-manager');
    }

    public function accept_order($OdID)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('OrderID', $OdID)->update(['OrderStatus' => 1]);
        Session::put('message', 'Đã duyệt đơn');

        return Redirect::to('/order-manager');
    }

    public function unaccept_order($OdID)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('OrderID', $OdID)->update(['OrderStatus' => 0]);
        Session::put('message', 'Chuyển sang chờ xử lí thành công');

        return Redirect::to('/order-manager');
    }

    public function delivered_order($OdID)
    {
        $this->AuthLogin();
        DB::table('tbl_order')->where('OrderID', $OdID)->update(['OrderStatus' => 2]);
        Session::put('message', 'Đơn hàng đã giao thành công');

        return Redirect::to('/view-detail-order/id=' . $OdID);
    }

    public function view_order($OdID)
    {
        $this->AuthLogin();

        $Order_detail = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_customer.CustomerID', '=', 'tbl_order.CustomerID')
            ->join('tbl_shipping', 'tbl_shipping.ShippingID', '=', 'tbl_order.ShippingID')->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*')->where('OrderID', $OdID)->first();
        $Product = DB::table('tbl_bill_detail')->join('tbl_product', 'tbl_product.ProductID', '=', 'tbl_bill_detail.ProductID')->select('tbl_bill_detail.*', 'tbl_product.ProductID', 'tbl_product.ProductName', 'tbl_product.ProductImage1')->where('OrderID', $OdID)->get();

        return view('admin.order-detail')->with('Order_detail', $Order_detail)->with('Product',$Product);
    }
}
