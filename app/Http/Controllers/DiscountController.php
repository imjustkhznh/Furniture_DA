<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class DiscountController extends Controller
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

    public function discount_manager()
    {

        $discount_list = Discount::orderby('DiscountID', 'DESC')->get();

        return view('admin.view_discount')->with(compact('discount_list'));
    }

    public function add_discount()
    {
        return view('admin.add_discount');
    }

    public function delete_discount($DiscountID)
    {
        DB::table('tbl_discount')->where('DiscountID', $DiscountID)->delete();
        Session::put('message', 'Xóa khuyến mãi thành công');

        return Redirect::to('/discount-manager');
    }

    public function check_discount(Request $request)
    {
        $data = $request->all();
        $discount_code = Discount::where('DiscountCode', $data['DiscountCode'])->first();
        if ($discount_code) {
            $code_dis = $discount_code->count();
            if ($code_dis > 0) {
                $session_dis = Session::get('discount'); // Luu ma giam gia vao session
                if ($session_dis == true) {
                    $is_isset = 0;
                    if ($is_isset == 0) {
                        $dis[] = [
                            'DiscountCode' => $discount_code->DiscountCode,
                            'DiscountType' => $discount_code->DiscountType,
                            'DiscountValue' => $discount_code->DiscountValue,
                            'DiscountStart' => $discount_code->DiscountStart,
                            'DiscountEnd' => $discount_code->DiscountEnd,
                        ];
                        Session::put('discount', $dis);
                    }
                } else {
                    $dis[] = [
                        'DiscountCode' => $discount_code->DiscountCode,
                        'DiscountType' => $discount_code->DiscountType,
                        'DiscountValue' => $discount_code->DiscountValue,
                        'DiscountStart' => $discount_code->DiscountStart,
                        'DiscountEnd' => $discount_code->DiscountEnd,
                    ];
                    Session::put('discount', $dis);
                }
                Session::save();

                return redirect()->back()->with('message', 'Áp dụng mã khuyến mãi thành công');
            }
        } else {
            return redirect()->back()->with('message', 'Mã khuyến mãi không hợp lệ');
        }
    }

    public function add_discount_data(Request $request)
    {
        $data = $request->all();
        $discount = new Discount;
        $discount->DiscountName = $data['DisName'];
        $discount->DiscountCode = $data['DisCode'];
        $discount->DiscountType = $data['DisType'];
        $discount->DiscountValue = $data['DisValue'];
        $discount->DiscountDescript = $data['DisDescrip'];
        $discount->DiscountStart = $data['DisStart'];
        $discount->DiscountEnd = $data['DisEnd'];
        $discount->save();
        Session::put('message', 'Thêm khuyến mãi thành công');

        return Redirect::to('/add-discount');
    }

    public function delete_code()
    {
        Session::forget('discount');
        Session::put('message', 'Đã xóa mã khuyến mãi');

        return Redirect::to('/show_cart');
    }
}
