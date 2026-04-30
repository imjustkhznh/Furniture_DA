<?php

namespace App\Http\Controllers;

use App\Models\City;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class ProductController extends Controller
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

    public function view_product()
    {
        $this->AuthLogin();
        $view_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.CategoryID', '=', 'tbl_product.CategoryID')->join('tbl_brand', 'tbl_brand.BrandID', '=', 'tbl_product.BrandID')->get();
        $manager_product = view('admin.view_product')->with('view_product', $view_product);

        return view('admin_layout')->with('admin.view_product', $manager_product);
    }

    public function add_product()
    {
        $this->AuthLogin();

        $catePro = DB::table('tbl_category_product')->orderby('CategoryID', 'ASC')->get();
        $brandPro = DB::table('tbl_brand')->orderby('BrandID', 'ASC')->get();

        return view('admin.add-product')->with('catePro', $catePro)->with('brandPro', $brandPro);
    }

    public function edit_product($product_proID)
    {
        $this->AuthLogin();

        $catePro = DB::table('tbl_category_product')->orderby('CategoryID', 'ASC')->get();
        $brandPro = DB::table('tbl_brand')->orderby('BrandID', 'ASC')->get();
        $edit_pro = DB::table('tbl_product')->where('ProductID', $product_proID)->get();
        $manager_product = view('admin.edit_product')->with('edit_pro', $edit_pro)->with('catePro', $catePro)->with('brandPro', $brandPro);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function delete_product($product_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductID', $product_proID)->delete();
        Session::put('message', 'Xóa thành công');

        return Redirect::to('/view-product');
    }

    public function update_product_data(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['ProductID'] = $request->ProductID;
        $data['BrandID'] = $request->brandID;
        $data['CategoryID'] = $request->cateID;
        $data['ProductName'] = $request->productName;
        $data['ProductPrice'] = $request->price;
        $data['ProductQuanty'] = $request->quanty;
        $data['ProductContent'] = $request->productContent;
        $data['ProductDescrip'] = $request->productDes;
        $data['ProductColor'] = $request->color;
        $GetImage1 = $request->file('image1');
        $GetImage2 = $request->file('image2');
        $GetImage3 = $request->file('image3');
        if ($GetImage1 != null) {
            $Name_img1 = 'Product-'.rand(0, 2000).'.'.$GetImage1->getClientOriginalExtension();
            $GetImage1->store($Name_img1);
            $GetImage1->move('public/Upload/Product', $Name_img1);
            $data['ProductImage1'] = $Name_img1;
        }
        if ($GetImage2 != null) {
            $Name_img2 = 'Product-'.rand(2001, 4000).'.'.$GetImage2->getClientOriginalExtension();
            $GetImage2->store($Name_img2);
            $GetImage2->move('public/Upload/Product', $Name_img2);
            $data['ProductImage2'] = $Name_img2;
        }
        if ($GetImage3 != null) {
            $Name_img3 = 'Product-'.rand(4001, 6000).'.'.$GetImage3->getClientOriginalExtension();
            $GetImage3->store($Name_img3);
            $GetImage3->move('public/Upload/Product', $Name_img3);
            $data['ProductImage3'] = $Name_img3;
        }
        DB::table('tbl_product')->where('ProductID', $request->ProductID)->update($data);
        Session::put('message', 'Cập nhật thành công');

        return Redirect::to('/view-product');
    }

    public function add_product_data(Request $request)
    {
        $this->AuthLogin();
        $data = [];
        $data['BrandID'] = $request->brandID;
        $data['CategoryID'] = $request->cateID;
        $data['ProductName'] = $request->productName;
        $data['ProductPrice'] = $request->price;
        $data['ProductQuanty'] = $request->quanty;
        $data['ProductContent'] = $request->productContent;
        $data['ProductDescrip'] = $request->productDes;
        $data['ProductChienluoc'] = $request->chienluoc;
        $data['ProductColor'] = $request->color;
        $data['ProductStatus'] = $request->productStatus;
        $GetImage1 = $request->file('image1');
        $GetImage2 = $request->file('image2');
        $GetImage3 = $request->file('image3');
        if ($GetImage1) {
            $Name_img1 = 'Product-'.rand(0, 2000).'.'.$GetImage1->getClientOriginalExtension();
            $GetImage1->store($Name_img1);
            $GetImage1->move('public/Upload/Product', $Name_img1);
            $data['ProductImage1'] = $Name_img1;
        }
        if ($GetImage2) {
            $Name_img2 = 'Product-'.rand(2001, 4000).'.'.$GetImage2->getClientOriginalExtension();
            $GetImage2->store($Name_img2);
            $GetImage2->move('public/Upload/Product', $Name_img2);
            $data['ProductImage2'] = $Name_img2;
        }
        if ($GetImage3) {
            $Name_img3 = 'Product-'.rand(4001, 6000).'.'.$GetImage3->getClientOriginalExtension();
            $GetImage3->store($Name_img3);
            $GetImage3->move('public/Upload/Product', $Name_img3);
            $data['ProductImage3'] = $Name_img3;
        }
        DB::table('tbl_product')->insert($data);
        Session::put('message', 'Thêm thành công');

        return Redirect::to('/add-product');

    }

    public function unactive_pro($product_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductID', $product_proID)->update(['ProductStatus' => 0]);
        Session::put('message', 'Sản phẩm đã được ẩn');

        return Redirect::to('view-product');
    }

    public function active_pro($product_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductID', $product_proID)->update(['ProductStatus' => 1]);
        Session::put('message', 'Sản phẩm đã được hiển thị');

        return Redirect::to('view-product');
    }

    public function unactive_hot($product_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductID', $product_proID)->update(['ProductChienluoc' => 0]);
        Session::put('message', 'Sản phẩm đã tắt hiển thị chiến lược');

        return Redirect::to('view-product');
    }

    public function active_hot($product_proID)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('ProductID', $product_proID)->update(['ProductChienluoc' => 1]);
        Session::put('message', 'Sản phẩm đã được kích hoạt là sản phẩm HOT');

        return Redirect::to('view-product');
    }

    // Chi tiết sản phẩm frontend
    public function detail_product($prodID)
    {
        $city = City::orderby('matp', 'ASC')->get();
        $Customer = DB::table('tbl_customer')->where('CustomerID', Session::get('CustomerID'))->get();
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $product = DB::table('tbl_product')->where('ProductID', $prodID)->join('tbl_category_product', 'tbl_category_product.CategoryID', '=', 'tbl_product.CategoryID')->join('tbl_brand', 'tbl_brand.BrandID', '=', 'tbl_product.BrandID')->get();
        foreach ($product as $key => $value) {
            $catePro_recen = $value->CategoryID;
        }
        $comment = DB::table('tbl_comment')->where('ProductID', $prodID)->get();
        $Rating = DB::table('tbl_comment')->where('ProductID', $prodID)->avg('Rating');
        $product_recen = DB::table('tbl_product')->where('tbl_category_product.CategoryID', $catePro_recen)->join('tbl_category_product', 'tbl_category_product.CategoryID', '=', 'tbl_product.CategoryID')->join('tbl_brand', 'tbl_brand.BrandID', '=', 'tbl_product.BrandID')->whereNotIn('tbl_product.ProductID', [$prodID])->get();

        return view('pages.shop.detail_product')->with(compact('city', 'Rating'))->with('comment', $comment)->with('Customer', $Customer)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('product', $product)->with('product_recen', $product_recen);
    }

    public function comment(Request $request)
    {
        $prodID = $request->ProID;
        $Customer_buy = DB::table('tbl_bill_detail')->join('tbl_order', 'tbl_order.OrderID', '=', 'tbl_bill_detail.OrderID')->select('tbl_order.CustomerID', 'tbl_order.OrderID', 'tbl_bill_detail.OrderID', 'tbl_bill_detail.ProductID')->where('ProductID', $prodID)->where('CustomerID', Session::get('CustomerID'))->get();
        $b = count($Customer_buy);
        if ($b == 0) {
            $data_comment = [];
            $data_comment['CustomerID'] = Session::get('CustomerID');
            $data_comment['ProductID'] = $request->ProID;
            $data_comment['CommentName'] = $request->CommentName;
            $data_comment['CommentEmail'] = $request->CommentEmail;
            $data_comment['Rating'] = $request->rating;
            $data_comment['CommentDetail'] = $request->Comment;
            $data_comment['CommentDate'] = date('y/m/d');
            if ($data_comment['Rating'] == false) {
                $data_comment['Rating'] = '5';
            }
            DB::table('tbl_comment')->insert($data_comment);

            return Redirect::to('/Detail-product_'.$request->ProID.'');
        }
        if ($b > 0) {
            Session::put('message','Bạn đã bình luận sản phẩm này');

            return Redirect::to('/Detail-product_'.$request->ProID.'');
        } else {
            Session::put('message','Bạn vui lòng mua hàng để có thể đánh giá sản phẩm');

            return Redirect::to('/Detail-product_'.$request->ProID.'');
        }
    }
}
