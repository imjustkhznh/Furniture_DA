<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Commune;
use App\Models\District;
use App\Models\Shipmoney;
use Illuminate\Http\Request;
use Redirect;
use Session;

class DeliveryController extends Controller
{
    public function delivery()
    {
        $city = City::orderby('matp', 'ASC')->get();
        $ship_money = Shipmoney::join('tbl_tinhthanhpho', 'tbl_tinhthanhpho.matp', '=', 'tbl_feeship.matp')->join('tbl_quanhuyen', 'tbl_quanhuyen.maqh', '=', 'tbl_feeship.maqh')->join('tbl_xaphuongthitran', 'tbl_xaphuongthitran.xaid', '=', 'tbl_feeship.xaid')->orderby('feeID', 'DESC')->get();

        return view('admin.delivery.delivery-manager')->with(compact('city', 'ship_money'));
    }

    public function select_delivery(Request $request)
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

    public function add_ship(Request $request)
    {
        $request->validate([
            'City' => 'required|not_in:0',
            'District' => 'required|not_in:0',
            'Commune' => 'required|not_in:0',
            'shipmoney' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        $exists = Shipmoney::where('matp', $data['City'])
            ->where('maqh', $data['District'])
            ->where('xaid', $data['Commune'])
            ->first();
        if ($exists) {
            Session::put('message', 'Khu vực này đã có phí ship, hãy sửa trực tiếp ở danh sách');

            return Redirect::to('/delivery-manager');
        }

        $feeship = new Shipmoney;
        $feeship->matp = $data['City'];
        $feeship->maqh = $data['District'];
        $feeship->xaid = $data['Commune'];
        $feeship->ship_money = $data['shipmoney'];
        $feeship->save();
        Session::put('message', 'Thêm thành công');

        return Redirect::to('/delivery-manager');
    }

    public function update_ship(Request $request, $feeID)
    {
        $request->validate([
            'ship_money' => 'required|numeric|min:0',
        ]);

        $feeship = Shipmoney::where('feeID', $feeID)->first();
        if (!$feeship) {
            Session::put('message', 'Không tìm thấy dòng phí ship cần sửa');

            return Redirect::to('/delivery-manager');
        }

        $feeship->ship_money = $request->input('ship_money');
        $feeship->save();
        Session::put('message', 'Cập nhật phí ship thành công');

        return Redirect::to('/delivery-manager');
    }

    public function delete_ship($feeID)
    {
        $feeship = Shipmoney::where('feeID', $feeID)->first();
        if ($feeship) {
            $feeship->delete();
            Session::put('message', 'Xóa phí ship thành công');
        } else {
            Session::put('message', 'Không tìm thấy dòng phí ship cần xóa');
        }

        return Redirect::to('/delivery-manager');
    }
}
