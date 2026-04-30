<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use DB;
use Redirect;
use Session;

class WishlistController extends Controller
{
    public function wishlist($cusID)
    {
        $Product_all = DB::table('tbl_product')->get();
        $Product_wishlist = Wishlist::orderby('ProductID', 'DESC')->where('CustomerID', Session::get('CustomerID'))->get();
        Session::put('Wishlist', $Product_wishlist);
        if ($Product_wishlist == false) {
            Session::forget('Wishlist');
        }

        return view('pages.wishlist.show-wishlist')->with('Product_all', $Product_all)->with(compact('Product_wishlist'));
    }

    public function add_to_wishlist($ProID)
    {
        if (Session::get('CustomerID')) {
            $wishlist = new Wishlist;
            $wishlist_list = Wishlist::where('CustomerID', Session::get('CustomerID'))->where('ProductID', $ProID)->first();
            $data_product = DB::table('tbl_product')->where('ProductID', $ProID)->first();
            if ($wishlist_list) {
                if ($wishlist_list->ProductID == $ProID) {
                    return Redirect::to('/wish-list_'.Session::get('CustomerID').'');
                } else {
                    $Product_quanty = 1;
                    $wishlist->ProductID = $data_product->ProductID;
                    $wishlist->CustomerID = Session::get('CustomerID');
                    $wishlist->ProductQuanty = 1;
                    $wishlist->ProductName = $data_product->ProductName;
                    $wishlist->ProductImage = $data_product->ProductImage1;
                    $wishlist->ProductColor = $data_product->ProductColor;
                    $wishlist->ProductPrice = $data_product->ProductPrice;
                    $wishlist->save();

                    return Redirect::to('/wish-list_'.Session::get('CustomerID').'');
                }
            } else {
                $Product_quanty = 1;
                $wishlist->ProductID = $data_product->ProductID;
                $wishlist->CustomerID = Session::get('CustomerID');
                $wishlist->ProductQuanty = 1;
                $wishlist->ProductName = $data_product->ProductName;
                $wishlist->ProductImage = $data_product->ProductImage1;
                $wishlist->ProductColor = $data_product->ProductColor;
                $wishlist->ProductPrice = $data_product->ProductPrice;
                $wishlist->save();

                return Redirect::to('/wish-list_'.Session::get('CustomerID').'');
            }
        } else {
            return Redirect::to('/check-login');
        }
    }

    public function remove_wishlist($wishlistID)
    {
        $wislist = Wishlist::where('WishlistID', $wishlistID)->where('CustomerID', Session::get('CustomerID'))->first();
        $wislist->delete();

        return Redirect::to('/wish-list_'.Session::get('CustomerID').'');
    }
}
