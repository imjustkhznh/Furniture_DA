<?php

namespace App\Http\Controllers;

use App\Models\City;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class BrandController extends Controller
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

    public function view_brand()
    {
        $this->AuthLogin();
        $view_brand = DB::table('tbl_brand')->get();
        $manager_brand = view('admin.view_brand')->with('view_brand', $view_brand);

        return view('admin_layout')->with('admin.view_brand', $manager_brand);
    }

    public function add_brand()
    {
        $this->AuthLogin();
        $city = City::orderby('matp', 'ASC')->get();

        return view('admin.add_brand')->with(compact('city'));
    }

    public function edit_brand($brand_proID)
    {
        $this->AuthLogin();
        $edit_cate = DB::table('tbl_brand')->where('BrandID', $brand_proID)->get();
        $manager_category = view('admin.edit_brand')->with('edit_brand', $edit_cate);

        return view('admin_layout')->with('admin.edit_brand', $manager_category);
    }

    public function delete_brand($brand_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('BrandID', $brand_proID)->delete();
        Session::put('message', 'Xóa thành công');

        return Redirect::to('/view-brand');
    }

    public function update_brand(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['BrandName'] = $request->brandName;
        $data['BrandDescrip'] = $request->brandDes;
        DB::table('tbl_brand')->where('brandID', $request->brandID)->update($data);
        Session::put('message', 'Cập nhật thành công');

        return Redirect::to('/view-brand');
    }

    public function add_brand_product(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['BrandName'] = $request->brandName;
        $data['BrandDescrip'] = $request->brandDes;
        $data['BrandStatus'] = $request->brandStatus;
        DB::table('tbl_brand')->insert($data);
        Session::put('message', 'Thêm thành công');

        return Redirect::to('/add-category');
    }

    public function unactive_brand($brand_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('BrandID', $brand_proID)->update(['BrandStatus' => 0]);
        Session::put('message', 'Thương hiệu sản phẩm đã được ẩn');

        return Redirect::to('view-brand');
    }

    public function active_brand($brand_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_brand')->where('BrandID', $brand_proID)->update(['BrandStatus' => 1]);
        Session::put('message', 'Thương hiệu sản phẩm đã được hiển thị');

        return Redirect::to('view-brand');
    }
}
