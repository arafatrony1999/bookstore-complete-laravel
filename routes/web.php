<?php

// use App\Models\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;


// SITE 
Route::get('/', 'App\Http\Controllers\HomeController@HomePage');
Route::get('/cart', 'App\Http\Controllers\HomeController@cart');
Route::get('/checkout', 'App\Http\Controllers\HomeController@checkout');
Route::get('/login', 'App\Http\Controllers\logRegController@login');
Route::get('/product/{product_id}','App\Http\Controllers\HomeController@product_page');
Route::get('/catagory','App\Http\Controllers\catagoryController@catagory');
Route::get('/catagory/বিষয়/{productCatagory}','App\Http\Controllers\catagoryController@catagoryWithData');
Route::get('/catagory/প্রকাশনী/{productProkashoni}','App\Http\Controllers\catagoryController@prokashoniWithData');
// Route::get('/profile', 'App\Http\Controllers\logRegController@profile');
// প্রকাশনী
// Route::get('/reboot', 'App\Http\Controllers\HomeController@reboot');
Route::post('/order', 'App\Http\Controllers\HomeController@order');

Route::get('/profile', 'App\Http\Controllers\logRegController@profile');
Route::get('/profile/my-orders', 'App\Http\Controllers\logRegController@myOrders');
Route::get('/profile/my-wishlist', 'App\Http\Controllers\logRegController@myWishlist');
Route::get('/signout', 'App\Http\Controllers\logRegController@signout');
Route::post('/save-info', 'App\Http\Controllers\logRegController@saveInfo');




Route::get('/catagory', 'App\Http\Controllers\catagoryController@catagory');
Route::get('/itemJson', 'App\Http\Controllers\catagoryController@itemJson');


Route::get('/getCartItemTotalData', 'App\Http\Controllers\HomeController@getCartItemTotalData');
Route::post('/bookFairCustomModal','App\Http\Controllers\HomeController@bookFairCustomModal');


// WishList add 
Route::post('/wishListAdd', 'App\Http\Controllers\HomeController@wishListAdd');
Route::post('/wishListDelete', 'App\Http\Controllers\HomeController@wishListDelete');

// Cart add 
Route::post('/cartURL', 'App\Http\Controllers\HomeController@cartURL');
Route::post('/axiosCartDelete', 'App\Http\Controllers\HomeController@axiosCartDelete');

// Review reactions
Route::post('/likeReview', 'App\Http\Controllers\HomeController@likeReview');
Route::post('/dislikeReview', 'App\Http\Controllers\HomeController@dislikeReview');
Route::get('/getLikesDislikesData', 'App\Http\Controllers\HomeController@getLikesDislikesData');

// Route::post('/axiosCartUpdate', 'App\Http\Controllers\HomeController@axiosCartUpdate');
Route::post('/cartQtyUpdate', 'App\Http\Controllers\HomeController@cartQtyUpdate');
Route::post('/customModalCartUrl', 'App\Http\Controllers\HomeController@customModalCartUrl');


Route::post('/submitReview', 'App\Http\Controllers\HomeController@submitReview');




Route::get('/adminProduct','App\Http\Controllers\adminController@adminproduct');
Route::get('/adminOrders','App\Http\Controllers\adminController@adminOrders');
Route::get('/admin/adminImages','App\Http\Controllers\adminController@adminImages');
Route::post('adminImageUpload','App\Http\Controllers\adminController@adminImageUpload');

// Orders
Route::get('/getorderData','App\Http\Controllers\adminController@getorderData');
Route::post('/orderUpdate','App\Http\Controllers\adminController@orderUpdate');


// product
Route::get('/getproductData','App\Http\Controllers\adminController@getproductData');
Route::post('/productAddNew','App\Http\Controllers\adminController@productAddNew');
Route::post('/productImageUrl','App\Http\Controllers\adminController@productImageUrl');
Route::post('/productDeleteURL','App\Http\Controllers\adminController@productDeleteURL');
Route::post('/productUpdateURL','App\Http\Controllers\adminController@productUpdateURL');
Route::post('/productFinalUpdateURL','App\Http\Controllers\adminController@productFinalUpdateURL');
Route::post('/productImageFinalUpdateURL','App\Http\Controllers\adminController@productImageFinalUpdateURL');



Route::get('/writers','App\Http\Controllers\adminController@writers');
Route::get('/writerNameData','App\Http\Controllers\adminController@writerNameData');
Route::post('/writerNameAddNew','App\Http\Controllers\adminController@writerNameAddNew');
Route::post('/writerUpdateURL','App\Http\Controllers\adminController@writerUpdateURL');
Route::post('/writerUpdateURLsend','App\Http\Controllers\adminController@writerUpdateURLsend');
Route::post('/writerDeleteURL','App\Http\Controllers\adminController@writerDeleteURL');
Route::post('/writerImport','App\Http\Controllers\adminController@writerImport');






Route::get('/prokashoni','App\Http\Controllers\adminController@prokashoni');
Route::get('/prokashoniNameData','App\Http\Controllers\adminController@prokashoniNameData');
Route::post('/prokashoniNameAddNew','App\Http\Controllers\adminController@prokashoniNameAddNew');
Route::post('/prokashoniUpdateURL','App\Http\Controllers\adminController@prokashoniUpdateURL');
Route::post('/prokashoniUpdateURLsend','App\Http\Controllers\adminController@prokashoniUpdateURLsend');
Route::post('/prokashoniDeleteURL','App\Http\Controllers\adminController@prokashoniDeleteURL');
Route::post('/prokashoniImport','App\Http\Controllers\adminController@prokashoniImport');







Route::get('/bishoy','App\Http\Controllers\adminController@bishoy');
Route::get('/bishoyNameData','App\Http\Controllers\adminController@bishoyNameData');
Route::post('/bishoyNameAddNew','App\Http\Controllers\adminController@bishoyNameAddNew');
Route::post('/bishoyUpdateURL','App\Http\Controllers\adminController@bishoyUpdateURL');
Route::post('/bishoyUpdateURLsend','App\Http\Controllers\adminController@bishoyUpdateURLsend');
Route::post('/bishoyDeleteURL','App\Http\Controllers\adminController@bishoyDeleteURL');
Route::post('/bishoyImport','App\Http\Controllers\adminController@bishoyImport');


// regestration 

Route::post('/reg','App\Http\Controllers\logRegController@reg');
Route::post('/log','App\Http\Controllers\logRegController@log');



Route::get('/importPage','App\Http\Controllers\adminController@importPage');
Route::post('/import','App\Http\Controllers\adminController@import');
// Route::post('/importExcel','App\Http\Controllers\adminController@importExcel');
Route::get('/export','App\Http\Controllers\adminController@export');





// site test
Route::get('a','App\Http\Controllers\catagoryController@a');


Route::get('b', function () {
    return Cart::content()->toArray();
});
