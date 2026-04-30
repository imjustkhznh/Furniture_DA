<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class AdminController extends Controller
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
        $SUB = DB::table('tbl_subcribe')->get();
        $CUS = DB::table('tbl_customer')->get();
        $GIT = DB::table('tbl_discount')->get();
        $WIS = DB::table('tbl_wishlist')->get();
        $TOTAL = DB::table('tbl_order')->where('OrderStatus', 1)->max('OrderTotal');
        $Count_PRD = count($PRD);
        $Count_ORD = count($ORD);
        $Count_SUB = count($SUB);
        $Count_CUS = count($CUS);
        $Count_GIT = count($GIT);
        $Count_WIS = count($WIS);
        $Count_ORDAC = count($ORDAC);

        return view('admin.dashboard')->with(compact('Count_PRD', 'Count_ORD', 'TOTAL', 'Count_SUB', 'Count_CUS', 'Count_GIT', 'Count_GIT', 'Count_ORDAC'));
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
