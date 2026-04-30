<?php

namespace App\Http\Controllers;

use DB;
use Redirect;
use Session;

class CompareController extends Controller
{
    public function compare()
    {
        $Product_all = DB::table('tbl_product')->get();

        return view('pages.compare.compare-product')->with('Product_all', $Product_all);
    }

    public function add_to_compare($ProID)
    {
        $Session_id = substr(md5(microtime()), rand(0, 50), 5);
        $data_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.CategoryID', '=', 'tbl_product.CategoryID')->join('tbl_brand', 'tbl_brand.BrandID', '=', 'tbl_product.BrandID')->where('ProductID', $ProID)->first();
        $Compare = Session::get('Compare');
        if ($Compare == true) {
            $val = 0;
            foreach ($Compare as $key => $value) {
                if ($value['ProductID'] == $data_product->ProductID) {
                    $val++;
                }
            }
            if ($val == 0) {
                $Compare[] = [
                    'SessionID' => $Session_id,
                    'ProductID' => $data_product->ProductID,
                    'ProductName' => $data_product->ProductName,
                    'ProductImage' => $data_product->ProductImage1,
                    'ProductPrice' => $data_product->ProductPrice,
                    'ProductColor' => $data_product->ProductColor,
                    'ProductContent' => $data_product->ProductContent,
                    'ProductDescrip' => $data_product->ProductDescrip,
                    'ProductCategory' => $data_product->CategoryName,
                    'ProductBrand' => $data_product->BrandName,
                ];
                Session::put('Compare', $Compare);
            }
        } else {
            $Compare[] = [
                'SessionID' => $Session_id,
                'ProductID' => $data_product->ProductID,
                'ProductName' => $data_product->ProductName,
                'ProductImage' => $data_product->ProductImage1,
                'ProductPrice' => $data_product->ProductPrice,
                'ProductColor' => $data_product->ProductColor,
                'ProductContent' => $data_product->ProductContent,
                'ProductDescrip' => $data_product->ProductDescrip,
                'ProductCategory' => $data_product->CategoryName,
                'ProductBrand' => $data_product->BrandName,
            ];
            Session::put('Compare', $Compare);
            Session::save();
        }

        return Redirect::to('/compare');
    }

    public function remove_compare($ProID)
    {
        if (Session::get('Compare') == true) {
            foreach (Session::get('Compare') as $key => $value) {
                $value['ProductID'] = $ProID;
                unset(Session::get('Compare')[$key]);
            }
            Session::put('Compare', Session::get('Compare'));
        }

        return redirect()->back();
    }
}
