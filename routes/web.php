<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// frontend
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
Route::get('/hahaha', 'App\Http\Controllers\HomeController@index');
Route::get('/shop', 'App\Http\Controllers\ShopController@shop_view');
// Danh mục sản phẩm
Route::get('/product-of-category_{category_proID}', 'App\Http\Controllers\ShopController@product_of_category');
Route::get('/product-of-brand_{Brand_proID}', 'App\Http\Controllers\ShopController@product_of_brand');
// CHi tiết sản phẩm
Route::get('/Detail-product_{prodID}', 'App\Http\Controllers\ProductController@detail_product');
// Backend
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
Route::get('/dashboard', 'App\Http\Controllers\AdminController@show_dashboard');
Route::get('/logout', 'App\Http\Controllers\AdminController@logout');
Route::post('/admin-dashboard', 'App\Http\Controllers\AdminController@dashboard');
// Danh muc san pham
Route::get('/view-category', 'App\Http\Controllers\CategoryController@view_category');
Route::get('/add-category', 'App\Http\Controllers\CategoryController@add_category');
Route::get('/edit-category/id={category_proID}', 'App\Http\Controllers\CategoryController@edit_category');
Route::get('/delete-category/id={category_proID}', 'App\Http\Controllers\CategoryController@delete_category');
Route::post('/update-category', 'App\Http\Controllers\CategoryController@update_category');
Route::post('/add-category-product', 'App\Http\Controllers\CategoryController@add_category_product');
Route::get('/unactive/id={category_proID}', 'App\Http\Controllers\CategoryController@unactive_category');
Route::get('/active/id={category_proID}', 'App\Http\Controllers\CategoryController@active_category');

// Thuowg hiệu sản phẩm
Route::get('/view-brand', 'App\Http\Controllers\BrandController@view_brand');
Route::get('/add-brand', 'App\Http\Controllers\BrandController@add_brand');
Route::get('/edit-brand/id={brand_proID}', 'App\Http\Controllers\BrandController@edit_brand');
Route::get('/delete-brand/id={brand_proID}', 'App\Http\Controllers\BrandController@delete_brand');
Route::post('/update-brand', 'App\Http\Controllers\BrandController@update_brand');
Route::post('/add-brand-product', 'App\Http\Controllers\BrandController@add_brand_product');
Route::get('/unactive_brand/id={brand_proID}', 'App\Http\Controllers\BrandController@unactive_brand');
Route::get('/active_brand/id={brand_proID}', 'App\Http\Controllers\BrandController@active_brand');

// Quản lí mail
Route::get('/mail-manager', 'App\Http\Controllers\MailController@mail_manager');
Route::get('/write-mail', 'App\Http\Controllers\MailController@write_mail');
Route::get('/read-mail_id={ContactID}', 'App\Http\Controllers\MailController@read_mail');
Route::get('/reply_id={ContactID}', 'App\Http\Controllers\MailController@reply_email');
Route::post('/send-email-admin', 'App\Http\Controllers\MailController@admin_send_mail');
// Quản lsi đơn hàng
Route::get('/order-manager', 'App\Http\Controllers\OrderController@order_manager');
Route::get('/delete-order/id={OdID}', 'App\Http\Controllers\OrderController@delete_order');
Route::get('/accept_order/id={OdID}', 'App\Http\Controllers\OrderController@accept_order');
Route::get('/unaccept_order/id={OdID}', 'App\Http\Controllers\OrderController@unaccept_order');
Route::get('/delivered_order/id={OdID}', 'App\Http\Controllers\OrderController@delivered_order');
Route::get('/view-detail-order/id={OdID}', 'App\Http\Controllers\OrderController@view_order');

// Quản lí slide
Route::get('/slide-manager', 'App\Http\Controllers\SlideController@slide_manager');
Route::get('/add-slide', 'App\Http\Controllers\SlideController@add_slide');
Route::post('/add-slide-data', 'App\Http\Controllers\SlideController@add_slide_data');
Route::get('/edit-slide_id={slideID}', 'App\Http\Controllers\SlideController@edit_slide');
Route::get('/delete-slide_id={slideID}', 'App\Http\Controllers\SlideController@delete_slide');
Route::post('/edit-slide-data', 'App\Http\Controllers\SlideController@edit_slide_data');
// Khuyến mãi
Route::get('/discount-manager', 'App\Http\Controllers\DiscountController@discount_manager');
Route::get('/add-discount', 'App\Http\Controllers\DiscountController@add_discount');
Route::get('/edit-discount_id={DiscountID}', 'App\Http\Controllers\DiscountController@edit_discount');
Route::post('/add-discount-data', 'App\Http\Controllers\DiscountController@add_discount_data');
Route::post('/update-discount-data/{DiscountID}', 'App\Http\Controllers\DiscountController@update_discount_data');
Route::get('/delete-discount_id={DiscountID}', 'App\Http\Controllers\DiscountController@delete_discount');
Route::post('/check-discount', 'App\Http\Controllers\DiscountController@check_discount');
Route::get('/delete-code', 'App\Http\Controllers\DiscountController@delete_code');
// San pham
Route::get('/view-product', 'App\Http\Controllers\ProductController@view_product');
Route::get('/add-product', 'App\Http\Controllers\ProductController@add_product');
Route::get('/edit-product/id={product_proID}', 'App\Http\Controllers\ProductController@edit_product');
Route::get('/delete-Product/id={product_proID}', 'App\Http\Controllers\ProductController@delete_product');
Route::post('/update-product-data', 'App\Http\Controllers\ProductController@update_product_data');
Route::post('/add-product-data', 'App\Http\Controllers\ProductController@add_product_data');
Route::get('/unactive_pro/id={product_proID}', 'App\Http\Controllers\ProductController@unactive_pro');
Route::get('/active_pro/id={product_proID}', 'App\Http\Controllers\ProductController@active_pro');
Route::get('/unactive_hot/id={product_proID}', 'App\Http\Controllers\ProductController@unactive_hot');
Route::get('/active_hot/id={product_proID}', 'App\Http\Controllers\ProductController@active_hot');
Route::post('/filter_price', 'App\Http\Controllers\ShopController@filter_price');
Route::get('/shop-tangdan', 'App\Http\Controllers\ShopController@sapxeptangdan');
Route::get('/shop-giamdan', 'App\Http\Controllers\ShopController@sapxepgiamdan');
// Bình luận
Route::post('/comment', 'App\Http\Controllers\ProductController@comment');
// Giỏ hàng
Route::post('/add-to-cart', 'App\Http\Controllers\CartController@add_to_cart');
Route::post('/add-cart-ajax', 'App\Http\Controllers\CartController@add_cart_ajax');
Route::get('/show_cart', 'App\Http\Controllers\CartController@show_cart');
Route::get('/show_cart_ajax', 'App\Http\Controllers\CartController@show_cart_ajax');
Route::get('/delete-pro/id={SessionID}', 'App\Http\Controllers\CartController@delete_pro');
Route::get('/remove/id={rowID}', 'App\Http\Controllers\CartController@delete');
Route::post('/update_quanty/rowID={rowID}', 'App\Http\Controllers\CartController@update_quanty');
Route::post('/update_cart', 'App\Http\Controllers\CartController@update_cart');
Route::get('/search', 'App\Http\Controllers\HomeController@search_key');
Route::get('/add-cart-home/id={ProID}', 'App\Http\Controllers\CartController@add_cart_home');
Route::get('/delete-all', 'App\Http\Controllers\CartController@delete__all');

// Yeu thich
// Thanh toán
Route::get('/check-login', 'App\Http\Controllers\LoginController@check_login');
Route::get('/check-out/{cusID}', 'App\Http\Controllers\CheckoutController@go_checkout');
Route::post('/send-info-shipping', 'App\Http\Controllers\CheckoutController@order');
Route::get('/completed-checkout', 'App\Http\Controllers\CheckoutController@completed');
// /send-info-shipping

// Đăng kí / Đăng nhập
Route::get('/sign-up', 'App\Http\Controllers\LoginController@sign_up');
Route::post('/send-new-account', 'App\Http\Controllers\LoginController@register');
Route::post('/login-user', 'App\Http\Controllers\LoginController@login');
Route::get('/my-account', 'App\Http\Controllers\LoginController@my_account');
Route::get('/logout-customer', 'App\Http\Controllers\LoginController@logout_customer');
Route::post('/change-info', 'App\Http\Controllers\LoginController@change_info');
Route::get('/wish-list_{cusID}', 'App\Http\Controllers\WishlistController@wishlist');
Route::get('/add-wishlist_id={ProID}', 'App\Http\Controllers\WishlistController@add_to_wishlist');
Route::get('/remove_wl_{WishlistID}', 'App\Http\Controllers\WishlistController@remove_wishlist');
// So sánh sản phẩm
Route::get('/compare', 'App\Http\Controllers\CompareController@compare');
Route::get('/add-to-compare_id={ProID}', 'App\Http\Controllers\CompareController@add_to_compare');
Route::get('/remove-compare_{ProID}', 'App\Http\Controllers\CompareController@remove_compare');
// Giới thiệu - Liên hệ
Route::get('/about', 'App\Http\Controllers\IntroductController@about');
Route::get('/contact', 'App\Http\Controllers\IntroductController@contact');

// Gửi mail
Route::post('/subcribe','App\Http\Controllers\MailController@sub_mail');
Route::post('/contact-mail','App\Http\Controllers\MailController@send_mail');

// Vận chuyển
Route::get('/delivery-manager','App\Http\Controllers\DeliveryController@delivery');
Route::post('/select-delivery','App\Http\Controllers\DeliveryController@select_delivery');
Route::post('/add-feeship','App\Http\Controllers\DeliveryController@add_ship');
Route::post('/update-feeship/{feeID}','App\Http\Controllers\DeliveryController@update_ship');
Route::get('/delete-feeship/{feeID}','App\Http\Controllers\DeliveryController@delete_ship');
Route::post('/select-delivery-home','App\Http\Controllers\CheckoutController@select_delivery_home');
// Kkieemr tra don hang
Route::get('/track-ID','App\Http\Controllers\CartController@track_id');
Route::post('/send-bill','App\Http\Controllers\CartController@send_bill');
Route::get('/order-detail/{OrderID}','App\Http\Controllers\CartController@view_order_detail');
