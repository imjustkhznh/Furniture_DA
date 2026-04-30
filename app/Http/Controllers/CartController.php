<?php

namespace App\Http\Controllers;

use Cart;
use DB;
use Illuminate\Http\Request;
use Redirect;
use Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $Product_ID = $request->ProID;
        $Product_quanty = $request->Quanty;
        $data_product = DB::table('tbl_product')->where('ProductID', $Product_ID)->first();
        $data = [
            'id' => $data_product->ProductID,
            'name' => $data_product->ProductName,
            'price' => $data_product->ProductPrice,
            'quantity' => $Product_quanty,
            'attributes' => [
                'image' => $data_product->ProductImage1,
                'color' => $data_product->ProductColor,
            ],
        ];
        Cart::add($data);
        Session::put('Cart', $data['id']);

        // Cart::destroy();
        return Redirect::to('/show_cart');
    }

    public function track_id()
    {
        return view('pages.track.track-id');
    }

    public function send_bill(Request $request)
    {
        $ID_Order = $request->OrderID;
        $Email = $request->Email;
        $Product_all = DB::table('tbl_product')->get();
        $info_order = DB::table('tbl_bill_detail')->where('OrderID', $ID_Order)->get();
        $info_order_tbl = DB::table('tbl_order')->where('OrderID', $ID_Order)->join('tbl_shipping', 'tbl_shipping.ShippingID', '=', 'tbl_order.ShippingID')->get();

        // echo "<pre>";
        // print_r($Detail);
        // echo "</pre>";
        return view('pages.track.detail_track')->with(compact('info_order', 'info_order_tbl'));
    }

    public function add_cart_home($ProID)
    {
        $Product_quanty = 1;
        $data_product = DB::table('tbl_product')->where('ProductID', $ProID)->first();
        $data = [
            'id' => $data_product->ProductID,
            'name' => $data_product->ProductName,
            'price' => $data_product->ProductPrice,
            'quantity' => $Product_quanty,
            'attributes' => [
                'image' => $data_product->ProductImage1,
                'color' => $data_product->ProductColor,
            ],
        ];
        Cart::add($data);
        Session::put('Cart', $data['id']);

        // Cart::destroy();
        return redirect()->back();
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        $Session_Cart = substr(md5(microtime()), rand(0, 50), 5);
        $Cart = Session::get('Cart');
        if ($Cart == true) {
            $val = 0;
            foreach ($Cart as $key => $value) {
                if ($value['ProductID'] == $data['cart_product_ID']) {
                    $val++;
                }
            }
            if ($val == 0) {

                $Cart[] = [
                    'Session_Cart' => $Session_Cart,
                    'ProductID' => $data['cart_product_ID'],
                    'ProductName' => $data['cart_product_Name'],
                    'ProductImage' => $data['cart_product_Image'],
                    'ProductPrice' => $data['cart_product_Price'],
                    'ProductQuanty' => $data['cart_product_Quanty'],
                    'ProductColor' => $data['cart_product_Color'],
                ];
                Session::put('Cart', $Cart);
            }
        } else {
            $Cart[] = [
                'Session_Cart' => $Session_Cart,
                'ProductID' => $data['cart_product_ID'],
                'ProductName' => $data['cart_product_Name'],
                'ProductImage' => $data['cart_product_Image'],
                'ProductPrice' => $data['cart_product_Price'],
                'ProductQuanty' => $data['cart_product_Quanty'],
                'ProductColor' => $data['cart_product_Color'],
            ];
            Session::put('Cart', $Cart);
        }
        Session::save();
    }

    public function show_cart_ajax()
    {
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();

        return view('pages.cart.shop-cart-ajax')->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct);
    }

    public function show_cart()
    {
        $Product_all = DB::table('tbl_product')->get();
        $cateProduct = DB::table('tbl_category_product')->where('CategoryStatus', 1)->orderby('CategoryID', 'DESC')->get();
        $brandProduct = DB::table('tbl_brand')->where('BrandStatus', 1)->orderby('BrandID', 'DESC')->get();

        return view('pages.cart.shop-cart')->with('cateProduct', $cateProduct)->with('brandProduct', $brandProduct)->with('Product_all', $Product_all);
    }

    public function delete_pro($Session_car)
    {
        if (Session::get('Cart') == true) {
            foreach (Session::get('Cart') as $key => $value) {
                $value['Session_Cart'] = $Session_car;
                unset(Session::get('Cart')[$key]);
            }
            Session::put('Cart', Session::get('Cart'));
        }

        return redirect()->back();
    }

    public function delete($rowID)
    {
        Cart::remove($rowID);

        return Redirect::to('/show_cart');
    }

    public function delete__all()
    {
        Cart::clear();
        Session::forget('Cart');
        Session::forget('discount');

        return Redirect::to('/show_cart');
    }

    public function update_quanty($rowID)
    {
        $Quanty = (int) request('Quanty', 1);
        Cart::update($rowID, ['quantity' => ['relative' => false, 'value' => $Quanty]]);

        return Redirect::to('/show_cart');
    }
}
