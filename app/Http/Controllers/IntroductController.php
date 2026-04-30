<?php

namespace App\Http\Controllers;

use DB;

class IntroductController extends Controller
{
    public function about()
    {
        $Product_all = DB::table('tbl_product')->get();

        return view('pages.Introduce.about-us')->with('Product_all', $Product_all);
    }

    public function contact()
    {
        $Product_all = DB::table('tbl_product')->get();

        return view('pages.Introduce.contact')->with('Product_all', $Product_all);
    }
}
