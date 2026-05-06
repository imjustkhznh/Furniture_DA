<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Session;

class ShopController extends Controller
{
    private function getPopularProducts()
    {
        $popularIds = DB::table('tbl_bill_detail')
            ->select('ProductID', DB::raw('SUM(ProductQuanty) as TotalSold'))
            ->groupBy('ProductID')
            ->orderBy('TotalSold', 'ASC')
            ->limit(3);

        return DB::table('tbl_product')
            ->joinSub($popularIds, 'popular', function ($join) {
                $join->on('tbl_product.ProductID', '=', 'popular.ProductID');
            })
            ->select('tbl_product.*', 'popular.TotalSold')
            ->get();
    }

    public function shop_view()
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $new_product = DB::table('tbl_product')->where('ProductStatus', 1)->orderby('ProductID', 'DESC')->where('ProductChienluoc', 0)->limit(8)->get();
        $hot_product = DB::table('tbl_product')->where('ProductChienluoc', 1)->orderby('ProductID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        Session::forget('discount');
        Session::forget('ShipMon');

        return view('pages.shop.list-product')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('new_product', $new_product)->with('hot_product', $hot_product);
    }

    public function product_of_category($category_ProID)
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        $product_of_Cate = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.CategoryID', '=', 'tbl_category_product.CategoryID')->where('tbl_product.CategoryID', $category_ProID)->get();

        return view('pages.shop.product-of-cate')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('product_of_Cate', $product_of_Cate);
    }

    public function filter_price(Request $request)
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        $Start = $request->Start;
        $End = $request->End;
        $pro_fil = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.CategoryID', '=', 'tbl_category_product.CategoryID')->where('ProductPrice', '>', $Start)->where('ProductPrice', '<', $End)->get();

        return view('pages.shop.product-of-cate')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('pro_fil', $pro_fil);

    }

    public function sapxeptangdan(Request $request)
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        $product_tangdan = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.CategoryID', '=', 'tbl_category_product.CategoryID')->orderby('ProductPrice', 'ASC')->get();

        return view('pages.shop.product-of-cate')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('product_tangdan', $product_tangdan);
    }

    public function sapxepgiamdan(Request $request)
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        $product_giamdan = DB::table('tbl_product')->join('tbl_category_product', 'tbl_product.CategoryID', '=', 'tbl_category_product.CategoryID')->orderby('ProductPrice', 'DESC')->get();

        return view('pages.shop.product-of-cate')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('product_giamdan', $product_giamdan);
    }

    public function product_of_brand($Brand_ProID)
    {
        $Product_all = DB::table('tbl_product')->get();
        $Popular = $this->getPopularProducts();
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();
        $product_of_Brand = DB::table('tbl_product')->join('tbl_brand','tbl_product.BrandID','=','tbl_brand.BrandID')->where('tbl_product.BrandID',$Brand_ProID)->get();

        return view('pages.shop.product-of-cate')->with('Popular', $Popular)->with('Product_all', $Product_all)->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('product_of_Cate',$product_of_Brand);
    }
}
