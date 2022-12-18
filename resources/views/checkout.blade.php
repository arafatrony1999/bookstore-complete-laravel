@extends('layouts.MainLayout')

@section('content')


    <section>
        <div class="page-title">
            <h1>Checkout</h1>
            <div class="page-dir">
                <span>home</span>
                <span> / </span>
                <span class="current-pag">Checkout</span>
            </div>
        </div>
    </section>


    <section class="container">
        <div class="coupon-que">
            <p><span><i class="fas fa-square-full"></i>Have a coupon?</span><span id="entrCupn">Click here to enter your code</span></p>
        </div>
        <div class="open-that-coupon-h0">
            <div class="coupon-open-que">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="coupon-field">
                    <input type="text" name="" placeholder="Coupon Code">
                    <button>Apply coupon</button>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="billing-address">
            <div class="address1">
                <h1>Billing Details</h1>

                @if (Cookie::has('uuid'))
                    @foreach ($profileInfo as $profileInfo)
        
                        <form id="myForm" autocomplete="off" method="post" action="/order">
                            @csrf
                            <input type="hidden" autocomplete="false" name="hidden">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" value="{{$profileInfo->userFirstName}}" name="firstName" class="form-control" id="firstName" placeholder="First Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" value="{{$profileInfo->userLastName}}" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" value="{{$profileInfo->userPhone}}" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" value="{{$profileInfo->userEmail}}" class="form-control" name="emailAddrs" id="emailAddr" placeholder="Email Address">
                            </div>

                            <div class="form-group">
                                <label for="CompanyName">Company name (optional)</label>
                                <input type="text" value="{{$profileInfo->userCompany}}" name="userCompany" class="form-control" id="CompanyName">
                            </div>
                            <div class="form-group">
                                <label for="countryName">Country</label>
                                <select style="font-size: 16px;background:white;" class="form-control" name="country">
                                    <option value="{{$profileInfo->userCountry}}" selected>{{$profileInfo->userCountry}}</option>
                                    <option value="">Select a Country...</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Australia">Australia</option>
                                    <option value="England">England</option>
                                    <option value="USA">USA</option>
                                    <option value="Bangladesh">Bangladesh</option>
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
                                <input type="text" value="{{$profileInfo->userAddress}}" class="form-control" name="streetAddr" id="streerAddr" placeholder="House Number and street name">
                                <p></p>
                                <input type="text" value="{{$profileInfo->userStreetAddress}}" class="form-control" name="streetAddr2" id="streerAddr2" placeholder="Apartment, suite, unit etc. (optional)">
                            </div>
                            <div class="form-group">
                                <label for="districtName">District</label>
                                <select style="font-size: 16px;background:white;" class="form-control" name="District">
                                    <option value="{{$profileInfo->userDistrict}}" selected>{{$profileInfo->userDistrict}}</option>
                                    <option value="">Select District...</option>
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
                                <input type="text" value="{{$profileInfo->userTownCity}}" class="form-control" name="townOrCity" id="streerAddr3">
                            </div>

                            
                            <div class="form-group">
                                <label for="Postcode">Postcode / ZIP (optional)</label>
                                <input type="text" value="{{$profileInfo->userZip}}" class="form-control" name="zipCode" id="post-zip">
                            </div>
                        </form>
                    @endforeach
                @else
                    <form id="myForm" autocomplete="off" method="post" action="/order">
                        @csrf
                        <input type="hidden" autocomplete="false" name="hidden">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="emailAddrs" id="emailAddr" placeholder="Email Address">
                        </div>

                        <div class="form-group">
                            <label for="CompanyName">Company name (optional)</label>
                            <input type="text" name="userCompany" class="form-control" id="CompanyName">
                        </div>
                        <div class="form-group">
                            <label for="countryName">Country</label>
                            <select style="font-size: 16px;background:white;" class="form-control" name="country">
                                <option value="">Select a Country...</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Australia">Australia</option>
                                <option value="England">England</option>
                                <option value="USA">USA</option>
                                <option value="Bangladesh">Bangladesh</option>
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
                            <input type="text" class="form-control" name="streetAddr" id="streerAddr" placeholder="House Number and street name">
                            <p></p>
                            <input type="text" class="form-control" name="streetAddr2" id="streerAddr2" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="form-group">
                            <label for="districtName">District</label>
                            <select style="font-size: 16px;background:white;" class="form-control" name="District">
                                <option value="">Select District...</option>
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
                            <input type="text" class="form-control" name="townOrCity" id="streerAddr3">
                        </div>

                        
                        <div class="form-group">
                            <label for="Postcode">Postcode / ZIP (optional)</label>
                            <input type="text" class="form-control" name="zipCode" id="post-zip">
                        </div>
                    </form>
                @endif
            </div>


            {{-- <div class="address2">
                <h1 id="checkBoxOpen"><input type="checkbox" id="check"> Ship to a different address?</h1>
                <form id="addTogg" class="addTogg" autocomplete="off" method="post" action="">
                    <input type="hidden" autocomplete="false" name="hidden">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="firstName">First Name</label>
                            <input type="text" name="firstName" class="form-control" id="firstName" placeholder="First Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="CompanyName">Company name (optional)</label>
                        <input type="text" name="CompanyName" class="form-control" id="CompanyName">
                    </div>
                    <div class="form-group">
                        <label for="countryName">Country</label>
                        <select style="font-size: 16px;background:white;" class="form-control" name="country">
                            <option value="">Select a Country...</option>
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
                        <input type="text" class="form-control" id="streerAddr" placeholder="House Number and street name">
                        <p></p>
                        <input type="text" class="form-control" id="streerAddr2" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>
                    <div class="form-group">
                        <label for="districtName">District</label>
                        <select style="font-size: 16px;background:white;" class="form-control" name="District">
                            <option value="">Select District...</option>
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
                        <input type="text" class="form-control" id="streerAddr3">
                    </div>

                    
                    <div class="form-group">
                        <label for="Postcode">Postcode / ZIP (optional)</label>
                        <input type="text" class="form-control" id="post-zip">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone</label>
                        <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="emailAddr" placeholder="Email Address">
                    </div>
                </form>

                
                <div class="form-group set-fs">
                    <label for="Order Notes">Order Notes (Optional)</label>
                    <textarea class="col-md-12" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                </div>


            </div> --}}
        </div>
    </section>

    
    <section class="container checkout-cart-space">

        <div class="cart-count1">
            <div class="this-section-header">
                <h1>Your Products in Cart</h1>
            </div>
        </div>
        
        <table id="cart-table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">view</th>
                    <th scope="col">product</th>
                    <th scope="col">price</th>
                    <th scope="col">quantity</th>
                    <th scope="col">total</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total=0;
                @endphp
                @if (Cookie::get('uuid')==null)
                    @foreach ($cart as $cart)
                        <tr>
                            <td data-label="Account"><i data-id="{{$cart->rowId}}" class="fas fa-times crossBtn"></i></td>
                            <td data-label="view"><img src="{{$cart->options->image}}" alt=""></td>
                            <td data-label="product">{{$cart->name}}</td>
                            <td data-label="price">৳ {{$cart->price}}.00</td>
                            <td data-label="quantity">
                                <form action="/cartQtyUpdate" method="post">
                                    @csrf
                                    <input type="number" name="qty" value="{{$cart->qty}}">
                                    <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                    <button style="font-size: 12px" class="btn btn-info getRowID" data-id="{{$cart->rowId}}">Update</button>
                                </form>
                            </td>
                            <td data-label="total">৳ {{$cart->subtotal}}.00</td>
                        </tr>
                        @php
                            $total+=$cart->subtotal;
                        @endphp
                    @endforeach
                @else
                    @foreach ($cart as $cart)
                    <tr>
                        <td data-label="Account"><i data-id="{{$cart->productID}}" class="fas fa-times crossBtn"></i></td>
                        <td data-label="view"><img src="{{$cart->productImage}}" alt=""></td>
                        <td data-label="product">{{$cart->productName}}</td>
                        <td data-label="price">৳ {{$cart->productPrice}}.00</td>

                        <td data-label="quantity">
                            <form action="/cartQtyUpdate" method="post">
                                @csrf
                                <input type="number" name="qty" value="{{$cart->productQty}}">
                                <input type="hidden" name="rowId" value="{{$cart->productID}}">
                                <input type="hidden" name="productPrice" value="{{$cart->productPrice}}">
                                <button style="font-size: 12px" class="btn btn-info getRowID" data-id="{{$cart->rowId}}">Update</button>
                            </form>
                        </td>

                        <td data-label="total">৳ {{$cart->subtotal}}.00</td>
                        @php
                            $total+=$cart->subtotal;
                        @endphp
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </section>

        
    <section class="container">
        <div class="cart-count1">
            <div class="this-section-header">
                <h1>Order Summery</h1>
            </div>

            <div class="cart-total-single-row">
                <div class="cart-total-left">
                    <h3>Product</h3>
                </div>
                <div class="cart-total-right">
                    <h3>Total</h3>
                </div>
            </div>

            @php
                $finalSubtotal = 0;
            @endphp
            @if (Cookie::has('uuid'))
                @foreach ($cartSummery as $cartSummery)
                    <div class="cart-total-single-row">
                        <div class="cart-total-left">
                            <h4>{{$cartSummery->productName}}  × {{$cartSummery->productQty}}</h4>
                        </div>
                        <div class="cart-total-right">
                            <h3><span style="color: red;">৳ {{$cartSummery->productPrice*$cartSummery->productQty}}.00</span></h3>
                        </div>
                    </div>
                    @php
                        $finalSubtotal+=$cartSummery->subtotal;
                    @endphp
                @endforeach
            @else
                @foreach ($cartSummery as $cartSummery)
                    <div class="cart-total-single-row">
                        <div class="cart-total-left">
                            <h4>{{$cartSummery->name}}  × {{$cartSummery->qty}}</h4>
                        </div>
                        <div class="cart-total-right">
                            <h3><span style="color: red;">৳ {{$cartSummery->price*$cartSummery->qty}}.00</span></h3>
                        </div>
                    </div>
                    @php
                        $finalSubtotal+=$cartSummery->subtotal;
                    @endphp
                @endforeach
            @endif

            <div class="cart-total-single-row">
                <div class="cart-total-left">
                    <h3>Subtotal</h3>
                </div>
                <div class="cart-total-right">
                    <h3>৳ {{$finalSubtotal}}.00</h3>
                </div>
            </div>
            <div class="cart-total-single-row">
                <div class="cart-total-left">
                    <h3>Shipping</h3>
                </div>
                <div class="cart-total-right">
                    <h3>flat rate: <span style="color: green;">৳ 45.00</span></h3>
                </div>
            </div>
            <div class="cart-total-single-row">
                <div class="cart-total-left">
                    <h3>Total</h3>
                </div>
                <div class="cart-total-right">
                    <h3>৳ {{$finalSubtotal+45}}.00</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="container checkout-cart-space">
        <div class="payment-section">
            <h2>Cash on Delievery</h2>
            <div class="payCash">
                Pay with cash upon delivery.
            </div>
            <div class="hr">
                <hr>
            </div>
            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
            <div class="cash-btn">
                <button type="submit" form="myForm" style="font-size: 16px;padding:10px 20px" class="btn btn-info">Place Order</button>
            </div>
        </div>
    </section>

@endsection