<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class LoginController extends Controller
{
    public function check_login()
    {
        $Product_all = DB::table('tbl_product')->get();

        return view('pages.login.login')->with('Product_all', $Product_all);
    }

    public function sign_up()
    {
        $Product_all = DB::table('tbl_product')->get();

        return view('pages.login.register')->with('Product_all', $Product_all);
    }

    public function register(Request $request)
    {
        $data = [];
        $data['CustomerFirstName'] = $request->FirstName;
        $data['CustomerName'] = $request->Name;
        $data['CustomerEmail'] = $request->Email;
        $data['CustomerPhone'] = $request->Phone;
        $data['CustomerUsername'] = $request->Username;
        $data['CustomerAddress'] = $request->Address;
        $data['CustomerPass'] = md5($request->Password);
        DB::table('tbl_customer')->insert($data);
        Session::put('message', 'Đăng kí tài khoản thành công');

        return Redirect::to('/sign-up');
    }

    public function login(Request $request)
    {
        $username = $request->Username;
        $password = md5($request->input('Password'));
        $result = DB::table('tbl_customer')->where('CustomerUsername', $username)->where('CustomerPass', $password)->first();
        if ($result != false) {
            Session::put('CustomerName', $result->CustomerName);
            Session::put('CustomerID', $result->CustomerID);

            return Redirect::to('/home');
        } else {
            Session::put('message', 'Tài khoản hoặc mật khẩu chưa đúng . Vui lòng kiểm tra và đăng nhập lại !!!');

            return Redirect::to('/check-login');
        }
    }

    public function my_account()
    {
        $Product_all = DB::table('tbl_product')->get();
        $Order_customer = DB::table('tbl_order')->where('CustomerID', Session::get('CustomerID'))->limit(8)->get();
        $My_info = DB::table('tbl_customer')->where('CustomerID', Session::get('CustomerID'))->get();

        return view('pages.my-account.my-account')->with('Order_customer', $Order_customer)->with('My_info', $My_info)->with('Product_all', $Product_all);
    }

    public function logout_customer()
    {
        Session::put('CustomerName', null);
        Session::put('CustomerID', null);

        return Redirect::to('/check-login');
    }

    public function change_info(Request $request)
    {
        $acc = DB::table('tbl_customer')->where('CustomerID', $request->CusID)->first();
        if ($request->password == '') {
            $data = [];
            $data['CustomerFirstName'] = $request->Fname;
            $data['CustomerName'] = $request->Name;
            $data['CustomerEmail'] = $request->Email;
            $data['CustomerPhone'] = $request->Phone;
            $data['CustomerAddress'] = $request->address;
            $data['CustomerUsername'] = $request->Username;
            $data['CustomerPass'] = $acc->CustomerPass;
            DB::table('tbl_customer')->where('CustomerID', $request->CusID)->update($data);
            Session::put('message', 'Cập nhật thành công');

            return redirect()->back();
        } else {
            if (md5($request->password) == $acc->CustomerPass) {
                $data['CustomerFirstName'] = $request->Fname;
                $data['CustomerName'] = $request->Name;
                $data['CustomerEmail'] = $request->Email;
                $data['CustomerPhone'] = $request->Phone;
                $data['CustomerAddress'] = $request->address;
                $data['CustomerUsername'] = $request->Username;
                $data['CustomerPass'] = md5($request->Newpass);
                DB::table('tbl_customer')->where('CustomerID', $request->CusID)->update($data);
                Session::put('message', 'Cập nhật thành công');

                return redirect()->back();
            } else {
                Session::put('message', 'Cập nhật thất bại');

                return redirect()->back();
            }
        }
    }
}
