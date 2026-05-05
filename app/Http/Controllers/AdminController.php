<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $adminID = Session::get('id_admin');
        if (!$adminID) {
            return Redirect::to('admin')->send();
        }
    }

    public function index()
    {
        return view('admin_login');
    }

    public function show_dashboard()
    {
        $this->AuthLogin();
        $PRD = DB::table('tbl_product')->where('ProductStatus', 1)->get();
        $ORD = DB::table('tbl_order')->where('OrderStatus', 0)->get();
        $ORDAC = DB::table('tbl_order')->where('OrderStatus', 1)->get();
        $ORDDE = DB::table('tbl_order')->where('OrderStatus', 2)->get();
        $SUB = DB::table('tbl_subcribe')->get();
        $CUS = DB::table('tbl_customer')->get();
        $GIT = DB::table('tbl_discount')->get();
        $WIS = DB::table('tbl_wishlist')->get();
        $TOTAL = DB::table('tbl_order')->where('OrderStatus', 2)->sum('OrderTotal');
        $Count_PRD = count($PRD);
        $Count_ORD = count($ORD);
        $Count_SUB = count($SUB);
        $Count_CUS = count($CUS);
        $Count_GIT = count($GIT);
        $Count_WIS = count($WIS);
        $Count_ORDAC = count($ORDAC);
        $Count_ORDDE = count($ORDDE);

        // Get Best Selling Products
        $BestSellers = DB::table('tbl_bill_detail')
            ->join('tbl_product', 'tbl_bill_detail.ProductID', '=', 'tbl_product.ProductID')
            ->select('tbl_product.ProductID', 'tbl_product.ProductName', 'tbl_product.ProductPrice', 'tbl_product.ProductImage1', DB::raw('SUM(tbl_bill_detail.ProductQuanty) as TotalSold'))
            ->groupBy('tbl_product.ProductID', 'tbl_product.ProductName', 'tbl_product.ProductPrice', 'tbl_product.ProductImage1')
            ->orderBy('TotalSold', 'desc')
            ->limit(3)
            ->get();

        // Get Recent Orders
        $RecentOrders = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.CustomerID', '=', 'tbl_customer.CustomerID')
            ->select('tbl_order.OrderID', 'tbl_order.OrderDate', 'tbl_order.OrderTotal', 'tbl_order.OrderStatus', 'tbl_customer.CustomerName')
            ->orderBy('tbl_order.OrderID', 'desc')
            ->limit(4)
            ->get();

        // Get Sales Data for Chart (30 days - from start of month)
        $sales30days = DB::table('tbl_order')
            ->selectRaw('DATE(OrderDate) as date, SUM(OrderTotal) as total')
            ->whereRaw("OrderDate >= DATE_FORMAT(CURDATE(), '%Y-%m-01')")
            ->groupBy(DB::raw('DATE(OrderDate)'))
            ->orderBy('date', 'asc')
            ->get();

        // Get Sales Data for Chart (90 days - from 3 months ago)
        $sales90days = DB::table('tbl_order')
            ->selectRaw('DATE(OrderDate) as date, SUM(OrderTotal) as total')
            ->whereRaw("OrderDate >= DATE_SUB(DATE_FORMAT(CURDATE(), '%Y-%m-01'), INTERVAL 2 MONTH)")
            ->groupBy(DB::raw('DATE(OrderDate)'))
            ->orderBy('date', 'asc')
            ->get();

        // Format data for chart (30 days)
        $labels30 = [];
        $data30 = [];
        foreach ($sales30days as $sale) {
            $labels30[] = date('M d', strtotime($sale->date));
            $data30[] = (float)$sale->total;
        }

        // Format data for chart (90 days)
        $labels90 = [];
        $data90 = [];
        foreach ($sales90days as $sale) {
            $labels90[] = date('M d', strtotime($sale->date));
            $data90[] = (float)$sale->total;
        }

        // Fallback: if 30 days empty, get last 30 days of actual data
        if (empty($labels30) || empty($data30)) {
            $sales30days = DB::table('tbl_order')
                ->selectRaw('DATE(OrderDate) as date, SUM(OrderTotal) as total')
                ->whereRaw("OrderDate >= DATE_SUB(CURDATE(), INTERVAL 30 DAY)")
                ->groupBy(DB::raw('DATE(OrderDate)'))
                ->orderBy('date', 'asc')
                ->get();
            
            $labels30 = [];
            $data30 = [];
            foreach ($sales30days as $sale) {
                $labels30[] = date('M d', strtotime($sale->date));
                $data30[] = (float)$sale->total;
            }
        }

        // Fallback: if 90 days empty, use 30 days
        if (empty($labels90) || empty($data90)) {
            $labels90 = $labels30;
            $data90 = $data30;
        }

        return view('admin.dashboard')->with(compact('Count_PRD', 'Count_ORD', 'TOTAL', 'Count_SUB', 'Count_CUS', 'Count_GIT', 'Count_WIS', 'Count_ORDAC', 'Count_ORDDE', 'BestSellers', 'RecentOrders', 'labels30', 'data30', 'labels90', 'data90'));
    }

    public function dashboard(Request $request)
    {
        $email_admin = $request->email_admin;
        $pass_admin = md5($request->input('pass_admin'));
        $result = DB::table('tbl_admin')->where('email_admin', $email_admin)->where('pass_admin', $pass_admin)->first();
        if ($result != false) {
            Session::put('name_admin', $result->name_admin);
            Session::put('id_admin', $result->id_admin);

            return Redirect::to('/dashboard');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu chưa đúng . Vui lòng kiểm tra và đăng nhập lại !!!');

            return Redirect::to('/admin');
        }
    }

    public function logout()
    {
        Session::put('name_admin', null);
        Session::put('id_admin', null);

        return Redirect::to('/admin');
    }
}
