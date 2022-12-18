<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;
use App\Models\reg;
use App\Models\wishList;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Review;

class logRegController extends Controller
{
    public function login(Request $request)
    {
        if ($request->hasCookie('uuid')) {
            return redirect('/profile');
        } else {
            return view('login');
        }
    }

    public function profile(Request $request){
        if($request->hasCookie('uuid')){
            $cookieCurrent = $request->cookie('uuid');
            $cookieCurrentUser = reg::where('userAuth','=',$cookieCurrent)->get();
            return view('/profile',[
                'cookieCurrentUser'=>$cookieCurrentUser
            ]);
        }
        else{
            return redirect('/login')->with('error-login','You need to login first');
        }
    }

    public function reg(Request $request)
    {
        $userFirstName = $request->input('userFirstName');
        $userLastName = $request->input('userLastName');
        $userEmail = $request->input('userEmail');
        $userPhone = $request->input('userPhone');
        $userPassword = $request->input('userPassword');

        // $userAuth = Hash::make($userEmail.$userPassword);
        $userPassword = md5($userPassword);
        $userAuth=md5($userEmail.$userPassword);

        $result = reg::insertOrIgnore([
            'userFirstName'=>$userFirstName,
            'userLastName'=>$userLastName,
            'userEmail'=>$userEmail,
            'userPhone'=>$userPhone,
            'userPassword'=>$userPassword,
            'userAuth'=>$userAuth
        ]);

        if ($result==true) {
            Cookie::queue('uuid',$userAuth,999999);
            return 1;
        } else {
            return 0;
        }
    }

    public function log(Request $request){
        $userInputEmail = $request->input('userInputEmail');
        $userInputPassword = $request->input('userInputPassword');

        $userInputPassword = md5($userInputPassword);

        $userInputAuth = md5($userInputEmail.$userInputPassword);

        $result = reg::where('userAuth',$userInputAuth)->count();

        if($result==1){
            Cookie::queue('uuid',$userInputAuth,999999);
            return 1;
        }
        else{
            return 0;
        }
    }

    public function signout(){
        Cookie::queue(Cookie::forget('uuid'));
        return redirect('/login');
    }

    public function saveInfo(Request $request){
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $dateOfBirth = $request->dateOfBirth;
        $phoneNumber = $request->phoneNumber;
        $userCompany = $request->userCompany;
        $country = $request->country;
        $streetAddr = $request->streetAddr;
        $streetAddr2 = $request->streetAddr2;
        $country = $request->country;
        $District = $request->District;
        $townOrCity = $request->townOrCity;
        $zipCode = $request->zipCode;

        
        $cookieID = Cookie::get('uuid');
        $userID = reg::where('userAuth',$cookieID)->pluck('userID')->first();

        $result = reg::where('userID','=',$userID)->update([
            'userFirstName'=>$firstName,
            'userLastName'=>$lastName,
            'dateOfBirth'=>$dateOfBirth,
            'userPhone'=>$phoneNumber,
            'userCompany'=>$userCompany,
            'userCountry'=>$country,
            'userDistrict'=>$District,
            'userTownCity'=>$townOrCity,
            'userAddress'=>$streetAddr,
            'userStreetAddress'=>$streetAddr2,
            'userZip'=>$zipCode
        ]);

        if($result==true){
            return redirect('/profile')->with('success-profile-update','Your data updated successfully! ');
        }
        else{
            return redirect('/profile')->with('error-profile-update','You did not change any data! ');
        }
    }

    public function myOrders(Request $request){
        if($request->hasCookie('uuid')){
            $cookieCurrent = $request->cookie('uuid');
            $cookieCurrentUser = reg::where('userAuth','=',$cookieCurrent)->get();
            $userID = reg::where('userAuth',$cookieCurrent)->pluck('userID')->first();

            $cart = orders::where('userID','=',$userID)->get();

            return view('/my-orders',[
                'cookieCurrentUser'=>$cookieCurrentUser,
                'cart'=>$cart
            ]);
        }
        else{
            return redirect('/login')->with('error-login','You need to login first');
        }
    }

    public function myWishlist(Request $request){
        if($request->hasCookie('uuid')){
            $cookieCurrent = $request->cookie('uuid');
            $cookieCurrentUser = reg::where('userAuth','=',$cookieCurrent)->get();
            $userID = reg::where('userAuth',$cookieCurrent)->pluck('userID')->first();

            $result = wishList::where('sessionORcookie','=',$cookieCurrent)->get();
            return view('my-wishlist',[
                'cookieCurrentUser'=>$cookieCurrentUser,
                'wish'=>$result
            ]);
        }
        else{
            return redirect('/login')->with('error-login','You need to login first');
        }
    }
}
