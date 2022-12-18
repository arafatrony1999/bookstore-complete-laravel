<?php

namespace App\Http\Controllers;

use App\Models\bishoy_name;
use Illuminate\Http\Request;
use App\Models\wishList;
use App\Models\Cart_modal;
use App\Models\product_modal;
use App\Models\prokashoni_name;
use App\Models\reg;
use App\Models\review;
use App\Models\review_reaction;
use App\Models\orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    function a(Request $request)
    {
        $session_id = session()->getId();
        return $session_id;
    }

    function HomePage()
    {
        $bookfair = product_modal::where('bookCatagory', '=', 'বইমেলা ২০২১')->get();
        $catagory2 = product_modal::where('bookCatagory', '=', 'উপন্যাস')->get();
        $product = product_modal::where('bookCatagory', '=', 'ইংরেজি ভাষার বই')->get();
        $newBook = product_modal::orderBy('id', 'desc')->take(6)->get();
        $mostSaleBook = product_modal::orderBy('total-sale', 'desc')->take(6)->get();
        $getCatagoriesBook = bishoy_name::take(14)->get();
        $getProkashoniBook = prokashoni_name::take(14)->get();
        return view('HomePage', [
            'bookfair' => $bookfair,
            'catagory2' => $catagory2,
            'product' => $product,
            'newBook' => $newBook,
            'mostSaleBook' => $mostSaleBook,
            'getCatagoriesBook' => $getCatagoriesBook,
            'getProkashoniBook' => $getProkashoniBook
        ]);
    }

    public function getCartItemTotalData(Request $request)
    {

        if (Cookie::get('uuid') == null) {
            $cart = Cart::count();
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $cart = Cart_modal::where('userID','=',$userID)->sum('productQty');
        }

        return $cart;
    }

    function cart()
    {
        if (Cookie::get('uuid') == null) {
            $result = Cart::content();

            return view('cart', ['cart' => $result]);
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $result = Cart_modal::where('userID', '=', $userID)->get();
            $address = reg::where('userAuth', '=', $cookieID)->pluck('userTownCity')->first();
            $zip = reg::where('userAuth', '=', $cookieID)->pluck('userZip')->first();

            return view('cart', [
                'cart' => $result,
                'address' => $address,
                'zip' => $zip
            ]);
        }
    }

    function product_page($product_id)
    {
        $details = (explode('=', $product_id))[1];

        $result = product_modal::where('id', '=', $details)->get();
        $catagory = product_modal::where('id', '=', $details)->pluck('bookCatagory');
        $all_catagory = product_modal::where('bookCatagory', '=', $catagory)->get();

        return view('product', [
            'product' => $result,
            'catagory' => $all_catagory
        ]);
    }

    function bookFairCustomModal(Request $request)
    {
        $bookFairCustomModalIDget = $request->input('customModalID');
        $result = product_modal::where('id', '=', $bookFairCustomModalIDget)->get();
        if ($result == true) {
            return $result;
        } else {
            return 0;
        }
    }

    function wishListAdd(Request $request)
    {
        $wishDataID = $request->input('wishDataID');

        if (Cookie::get('uuid') == null) {
            $sessionID = session()->getId();
        } else {
            $sessionID = Cookie::get('uuid');
        }

        $result = wishList::insertOrIgnore([
            'sessionORcookie' => $sessionID,
            'bookID' => $wishDataID
        ]);

        if ($result == true) {
            return $wishDataID;
        } else {
            return 0;
        }
    }


    function wishListDelete(Request $request)
    {
        $wishDataID = $request->input('wishDataID');
        $result = wishList::where('bookID', '=', $wishDataID)->delete();

        if ($result == true) {
            return $wishDataID;
        } else {
            return 0;
        }
    }

    function cartURL(Request $request)
    {
        $cartDataIDcatch = $request->input('cartDataIDcatch');
        $cartItemName = $request->input('cartItemName');
        $cartItemPrice = $request->input('cartItemPrice');
        $cartItemImage = $request->input('cartItemImage');

        if (Cookie::get('uuid') == null) {
            $result = Cart::add([
                'id' => $cartDataIDcatch,
                'name' => $cartItemName,
                'qty' => 1,
                'price' => $cartItemPrice,
                'weight' => 550,
                'options' => [
                    'image' => $cartItemImage
                ],
            ]);
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $checkAvaiblety = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->count();

            $productQty = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->pluck('productQty')->first();


            if ($checkAvaiblety == 1) {
                $productQty = (int)$productQty;
                $productQty = $productQty + 1;

                $cartItemPriceSubtotal = (int)$cartItemPrice;
                $cartItemPriceSubtotal = $cartItemPrice * $productQty;



                $result = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->update([
                    'productQty' => $productQty,
                    'subtotal' => $cartItemPriceSubtotal
                ]);
            } else {
                $result = Cart_modal::insertOrIgnore([
                    'userID' => $userID,
                    'productID' => $cartDataIDcatch,
                    'productName' => $cartItemName,
                    'productPrice' => $cartItemPrice,
                    'productQty' => '1',
                    'productImage' => $cartItemImage,
                    'subtotal' => $cartItemPrice
                ]);
            }
        }

        if ($result == true) {
            return $cartDataIDcatch;
        } else {
            return 0;
        }
    }

    public function customModalCartUrl(Request $request)
    {
        $cartDataIDcatch = $request->customID;
        $cartItemName = $request->customName;
        $cartItemPrice = $request->customPrice;
        $cartItemImage = $request->customImage;
        $cartItemQty = $request->customQty;
        $cartItemQty = (int)$cartItemQty;

        if (Cookie::get('uuid') == null) {
            $result = Cart::add([
                'id' => $cartDataIDcatch,
                'name' => $cartItemName,
                'qty' => $cartItemQty,
                'price' => $cartItemPrice,
                'weight' => 550,
                'options' => [
                    'image' => $cartItemImage
                ],
            ]);
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $checkAvaiblety = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->count();

            $productQty = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->pluck('productQty')->first();


            if ($checkAvaiblety == 1) {
                $productQty = (int)$productQty;
                $productQty = $productQty + $cartItemQty;

                $cartItemPriceSubtotal = (int)$cartItemPrice;
                $cartItemPriceSubtotal = $cartItemPrice * $productQty;



                $result = Cart_modal::where('userID', $userID)->where('productID', $cartDataIDcatch)->update([
                    'productQty' => $productQty,
                    'subtotal' => $cartItemPriceSubtotal
                ]);
            } else {
                $result = Cart_modal::insertOrIgnore([
                    'userID' => $userID,
                    'productID' => $cartDataIDcatch,
                    'productName' => $cartItemName,
                    'productPrice' => $cartItemPrice,
                    'productQty' => $cartItemQty,
                    'productImage' => $cartItemImage,
                    'subtotal' => $cartItemPrice
                ]);
            }
        }

        if ($result == true) {
            return redirect('/cart')->with('success', 'Product Added successfully');
        } else {
            return redirect('/cart')->with('error', 'Product Added failed. Try again');
        }
    }

    public function axiosCartDelete(Request $request)
    {
        $id = $request->input('getCrossID');

        if (Cookie::get('uuid') == null) {
            $result = Cart::remove($id);
            return 1;
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $result = Cart_modal::where('userID', '=', $userID)->where('productID', '=', $id)->delete();
            // return $userID;
            if ($result == true) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    public function axiosCartUpdate(Request $request)
    {
        $id = $request->input('getRowID');
        $qty = $request->input('getRowqty');

        if (Cookie::get('uuid') == null) {
            $result = Cart::update($id, ['qty' => $qty]);
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $result = Cart_modal::where('userID', '=', $userID)->where('productID', '=', $id)->delete();
        }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    public function cartQtyUpdate(Request $request)
    {
        if (Cookie::get('uuid') == null) {
            $result = Cart::update($request->rowId, $request->qty);
        } else {
            $productID = $request->rowId;
            $qty = $request->qty;
            $productPrice = $request->productPrice;

            $qty = (int)$qty;
            $productPrice = (int)$productPrice;

            $finalSubtotal = $qty * $productPrice;

            $result = Cart_modal::where('productID', '=', $productID)->update([
                'productQty' => $qty,
                'subtotal' => $finalSubtotal
            ]);
        }
        if ($result == true) {
            return redirect('/cart')->with('success', 'Product Updated successfully!');
        } else {
            return redirect('/cart')->with('error', 'You do not update any product.');
        }
    }

    public function submitReview(Request $request)
    {
        $productID = $request->productID;
        $productName = $request->productName;
        $review = $request->review;

        $cookieID = Cookie::get('uuid');
        $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

        $user_first_name = reg::where('userAuth', $cookieID)->pluck('userFirstName')->first();
        $user_last_name = reg::where('userAuth', $cookieID)->pluck('userLastName')->first();

        $user_name = $user_first_name.' '.$user_last_name;

        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("d-m-y h:i:sa");

        $result = review::insertOrIgnore([
            'productID' => $productID,
            'userID' => $userID,
            'user_name' => $user_name,
            'productName' => $productName,
            'review_text' => $review,
            'Review_time' => $timeDate
        ]);

        if ($result == true) {
            return redirect('/product/product_id=' . $productID)->with('success_review', 'Review submitted successfully!');
        } else {
            return redirect('/product/product_id=' . $productID)->with('error_review', 'Review submitted failed!');
        }
    }

    public function likeReview(Request $request)
    {
        $productID = $request->input('id');
        $review_id = $request->input('review_id');

        $cookieID = Cookie::get('uuid');
        $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

        $check = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->count();
        if ($check !== 0) {
            $check = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->where('action', '=', 'disliked')->count();
            if ($check !== 0) {
                $result = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->update([
                    'action' => 'liked'
                ]);
            } else {
                $result = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->delete();
            }
        } else {
            $result = review_reaction::insertOrIgnore([
                'productID' => $productID,
                'userID' => $userID,
                'review_id' => $review_id,
                'action' => 'liked'
            ]);
        }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }



    public function dislikeReview(Request $request)
    {
        $productID = $request->input('id');
        $review_id = $request->input('review_id');

        $cookieID = Cookie::get('uuid');
        $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

        $check = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->count();
        if ($check !== 0) {
            $check = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->where('action', '=', 'liked')->count();
            if ($check !== 0) {
                $result = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->update([
                    'action' => 'disliked'
                ]);
            } else {
                $result = review_reaction::where('productID', '=', $productID)->where('review_id', '=', $review_id)->where('userID', '=', $userID)->delete();
            }
        } else {
            $result = review_reaction::insertOrIgnore([
                'productID' => $productID,
                'userID' => $userID,
                'review_id' => $review_id,
                'action' => 'disliked'
            ]);
        }

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    // public function getLikesDislikesData(){
    //     $result = review_reaction::where('productID','=',$productID)->where('review_id','=',$review_id)->where('userID','=',$userID)->get();

    //     return $result;
    // }

    public function checkout(){
        $cookieID = Cookie::get('uuid');
        $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();
        $profileInfo = reg::where('userID','=',$userID)->get();

        if (Cookie::get('uuid') == null) {
            $result = Cart::content();

            return view('checkout',[
                'profileInfo'=>$profileInfo,
                'cart'=>$result,
                'cartSummery'=>$result
            ]);
        }
        else {

            $result = Cart_modal::where('userID', '=', $userID)->get();

            return view('checkout', [
                'cart' => $result,
                'profileInfo'=>$profileInfo,
                'cartSummery'=>$result
            ]);
        }
    }

    public function order(Request $request){
        if (Cookie::get('uuid') == null) {
            $cart = Cart::content();
            $userID = session()->getId();
        } else {
            $cookieID = Cookie::get('uuid');
            $userID = reg::where('userAuth', $cookieID)->pluck('userID')->first();

            $cart = Cart_modal::where('userID','=',$userID)->get();
        }

        
        $firstName = $request->firstName;
        $lastName = $request->lastName;

        $orderName = $firstName ." ". $lastName;

        $phoneNumber = $request->phoneNumber;
        $emailAddrs = $request->emailAddrs;
        $userCompany = $request->userCompany;
        $country = $request->country;
        $streetAddr = $request->streetAddr;
        $streetAddr2 = $request->streetAddr2;
        $District = $request->District;
        $townOrCity = $request->townOrCity;
        $zipCode = $request->zipCode;

        $numbers = range(1,10);
        shuffle($numbers);

        $numbers = implode($numbers);
        

        
        if (Cookie::get('uuid') == null) {
            foreach($cart as $cart){
                $id = $cart->id;
                $name = $cart->name;
                $qty = $cart->qty;
                $price = $cart->price;
                $subtotal = $cart->subtotal;

                $result = orders::insert([
                    'userID'=>$userID,
                    'productID'=>$id,
                    'productName'=>$name,
                    'productQty'=>$qty,
                    'productPrice'=>$price,
                    'subtotal'=>$subtotal,
                    'orderID'=>$numbers,
                    'orderName'=>$orderName,
                    'orderPhone'=>$phoneNumber,
                    'orderEmail'=>$emailAddrs,
                    'userCompany'=>$userCompany,
                    'userCountry'=>$country,
                    'userAddress'=>$streetAddr,
                    'userDistrict'=>$District,
                    'userTownCity'=>$townOrCity,
                    'userZip'=>$zipCode
                ]);
            }
        } else {
            foreach($cart as $cart){
                $id = $cart->productID;
                $name = $cart->productName;
                $qty = $cart->productQty;
                $price = $cart->productPrice;
                $subtotal = $cart->subtotal;

                $count = orders::where('userID','=',$userID)->where('productID','=',$id)->count();
                if($count==0){
                    $result = orders::insert([
                        'userID'=>$userID,
                        'productID'=>$id,
                        'productName'=>$name,
                        'productQty'=>$qty,
                        'productPrice'=>$price,
                        'subtotal'=>$subtotal,
                        'orderID'=>$numbers,
                        'orderName'=>$orderName,
                        'orderPhone'=>$phoneNumber,
                        'orderEmail'=>$emailAddrs,
                        'userCompany'=>$userCompany,
                        'userCountry'=>$country,
                        'userAddress'=>$streetAddr,
                        'userDistrict'=>$District,
                        'userTownCity'=>$townOrCity,
                        'userZip'=>$zipCode
                    ]);
                }else{
                    $result=false;
                }
            }
        }

        if($result==true){
            return redirect('/profile/my-orders')->with('success-order','Your orders have been recorded. We will inform you shortly.');
        }
        elseif($result==false){
            return redirect('/profile/my-orders')->with('unsuccess-order','Same Product order already in progress.');
        }
        else{
            return redirect('/profile/my-orders')->with('error-order','Sorry! Your order failed to place.');
        }
    }

    function reboot()
    {
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('cache:clear');
        $result = Artisan::call('view:clear');
        return $result;
        // 'appliedCoupon'=>$
        // 'discount'=>$
        // 'serviceCharge'=>$
    }
}
