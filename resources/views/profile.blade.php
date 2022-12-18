@extends('layouts.MainLayout')

@section('content')


    <section>
        <div class="page-title">
            <h1>Profile</h1>
            <div class="page-dir">
                <span>home</span>
                <span> / </span>
                <span class="current-pag">My Orders</span>
            </div>
        </div>
    </section>


    @foreach ($cookieCurrentUser as $cookieCurrentUser)
        <section class="container">
            <div class="profile-section">
                <div class="profile-left">
                    <div class="profile-main">
                        <div class="profile-image">
                            <img src="{{URL::asset('images/avatar.png')}}" alt="">
                        </div>
                        <div class="profile-other">
                            <h4>Hello,</h4>
                            <h1>{{$cookieCurrentUser->userFirstName}} {{$cookieCurrentUser->userLastName}}</h1>
                        </div>
                    </div>
                    <div class="profile-catagory">
                        <a href="/profile" class="an-active">My Account</a>
                        <a href="/profile/my-orders">My Orders</a>
                        <a href="/cart">My Cart items</a>
                        <a href="/profile/my-wishlist">My Wishlist</a>
                        <a href="#">My Reviews</a>
                        <a href="#">My Account</a>
                    </div>
                    <a href="/signout" class="last-anchor"><span>Sign Out</span></a>
                </div>
                <div class="profile-right">
                    <h2>Personal Information</h2>
                        <form autocomplete="off" method="post" action="/save-info">
                            <div class="profile-form">
                                @if (session()->has('success-profile-update'))
                                    <div style="font-size: 16px" class="alert alert-success my-3" role="alert">
                                        {{session()->get('success-profile-update')}}
                                    </div>
                                @endif
                                @if (session()->has('error-profile-update'))
                                    <div style="font-size: 16px" class="alert alert-danger my-3" role="alert">
                                        {{session()->get('error-profile-update')}}
                                    </div>
                                @endif
                            @csrf
                            <input type="hidden" autocomplete="false" name="hidden">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" name="firstName" class="form-control" id="lastName"
                                        placeholder="First Name" value="{{$cookieCurrentUser->userFirstName}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName"
                                        placeholder="Last Name" value="{{$cookieCurrentUser->userLastName}}">
                                </div>
                            </div>
                            <label for="birthDate">Date of Birth</label>
                            <input class="form-control" type="date" name="dateOfBirth" placeholder="dd-mm-yyyy" value="{{$cookieCurrentUser->dateOfBirth}}"
                                min="1997-01-01" max="2030-12-31">
                                
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" class="form-control" value="{{$cookieCurrentUser->userPhone}}" name="phoneNumber" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" value="{{$cookieCurrentUser->userEmail}}" name="emailAddr" placeholder="Email Address" disabled>
                            </div>
                            <div class="form-group">
                                <label for="CompanyName">Company name (optional)</label>
                                <input type="text" name="userCompany" class="form-control" id="CompanyName" value="{{$cookieCurrentUser->userCompany}}">
                            </div>
                            <div class="form-group">
                                <label for="countryName">Country</label>
                                <select style="font-size: 16px;background:white;" class="form-control" name="country">
                                    <option value="">Select a Country...</option>
                                    <option value="{{$cookieCurrentUser->userCountry}}" selected>{{$cookieCurrentUser->userCountry}}</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Australia">Australia</option>
                                    <option value="England">England</option>
                                    <option value="USA">USA</option>
                                    <option value="Bangladesh" selected>Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Srilanka">Srilanka</option>
                                    <option value="Afganistan">Afganistan</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Chaina">Chaina</option>
                                    <option value="UAE">UAE</option>
                                    <option value="Korea">Korea</option>
                                    <option value="Nepal">Nepal</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="streerAddr">Street address</label>
                                <input type="text" class="form-control" id="streetAddr" name="streetAddr"
                                    placeholder="House Number and street name" value="{{$cookieCurrentUser->userAddress}}">
                                <p></p>
                                <input type="text" class="form-control" name="streetAddr2" id="streetAddr2"
                                    placeholder="Apartment, suite, unit etc. (optional)" value="{{$cookieCurrentUser->userStreetAddress}}">
                            </div>
                            <div class="form-group">
                                <label for="districtName">District</label>
                                <select style="font-size: 16px;background:white;" class="form-control" name="District">
                                    <option value="">Select District...</option>
                                    <option vlaue="{{$cookieCurrentUser->userDistrict}}" selected>{{$cookieCurrentUser->userDistrict}}</option>
                                    <option value="Barguna">Barguna</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Bhola">Bhola</option>
                                    <option value="Jhalokati">Jhalokati</option>
                                    <option value="Patuakhali">Patuakhali</option>
                                    <option value="Brahmanbaria">Brahmanbaria</option>
                                    <option value="Chandpur">Chandpur</option>
                                    <option value="Chittagong">Chittagong</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Comilla">Comilla</option>
                                    <option value="Noakhali">Noakhali</option>
                                    <option value="Feni">Feni</option>
                                    <option value="Gazipur">Gazipur</option>
                                    <option value="Munshiganj">Munshiganj</option>
                                    <option value="Narayanganj">Narayanganj</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Town / City</label>
                                <input type="text" name="townOrCity" class="form-control" id="streerAddr3" value="{{$cookieCurrentUser->userTownCity}}">
                            </div>
                            <div class="form-group">
                                <label for="Postcode">Postcode / ZIP (optional)</label>
                                <input type="text" name="zipCode" class="form-control" id="post-zip" value="{{$cookieCurrentUser->userZip}}">
                            </div>

                            <button style="font-size: 14px" type="submit" class="btn btn-info my-4">Save Info</button>
                            <div class="warning-alert">( Don't click the "Save Info" button if you don't want to make any change. )</div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>

    @endforeach
    
@endsection