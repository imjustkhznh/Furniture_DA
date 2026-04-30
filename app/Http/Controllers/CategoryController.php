<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class CategoryController extends Controller
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

    public function view_category()
    {
        $this->AuthLogin();
        $view_cate = DB::table('tbl_category_product')->get();
        $manager_category = view('admin.view_category')->with('view_cate', $view_cate);

        return view('admin_layout')->with('admin.view_category', $manager_category);
    }

    public function add_category()
    {
        $this->AuthLogin();

        return view('admin.add_category');
    }

    public function edit_category($category_proID)
    {
        $this->AuthLogin();

        $edit_cate = DB::table('tbl_category_product')->where('CategoryID', $category_proID)->get();
        $manager_category = view('admin.edit_category')->with('edit_cate', $edit_cate);

        return view('admin_layout')->with('admin.edit_category', $manager_category);
    }

    public function delete_category($category_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('CategoryID', $category_proID)->delete();
        Session::put('message', 'Xóa thành công');

        return Redirect::to('/view-category');
    }

    public function update_category(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['CategoryName'] = $request->cateName;
        $data['CategoryDescrip'] = $request->cateDes;
        DB::table('tbl_category_product')->where('CategoryID', $request->cateID)->update($data);
        Session::put('message', 'Cập nhật thành công');

        return Redirect::to('/view-category');
    }

    public function add_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['CategoryName'] = $request->cateName;
        $data['CategoryDescrip'] = $request->cateDes;
        $data['CategoryStatus'] = $request->cateStatus;
        DB::table('tbl_category_product')->insert($data);
        Session::put('message', 'Thêm thành công');

        return Redirect::to('/add-category');
    }

    public function unactive_category($category_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('CategoryID', $category_proID)->update(['CategoryStatus' => 0]);
        Session::put('message', 'Danh mục sản phẩm đã được ẩn');

        return Redirect::to('view-category');
    }

    public function active_category($category_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('CategoryID', $category_proID)->update(['CategoryStatus' => 1]);
        Session::put('message', 'Danh mục sản phẩm đã được hiển thị');

        return Redirect::to('view-category');
    }
}
