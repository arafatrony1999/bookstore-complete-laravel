@extends('layouts.MainLayout')

@section('content')


    <section>
        <div class="page-title">
            <h1>Profile</h1>
            <div class="page-dir">
                <span>home</span>
                <span> / </span>
                <span class="current-pag">Profile</span>
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
                        <a href="/profile">My Account</a>
                        <a href="/profile/my-orders" class="an-active">My Orders</a>
                        <a href="/cart">My Cart items</a>
                        <a href="/profile/my-wishlist">My Wishlist</a>
                        <a href="#">My Reviews</a>
                        <a href="#">My Account</a>
                    </div>
                    <a href="/signout" class="last-anchor"><span>Sign Out</span></a>
                </div>


                <div class="profile-right">
                    <h2>My Orders</h2>
                    @if (Session::has('success-order'))
                        <div style="font-size: 16px" class="alert alert-primary" role="alert">
                            {{session()->get('success-order')}}
                        </div>
                    @endif

                    @if (Session::has('error-order'))
                        <div style="font-size: 16px" class="alert alert-danger" role="alert">
                            {{session()->get('error-order')}}
                        </div>
                    @endif

                    @if (Session::has('unsuccess-order'))
                        <div style="font-size: 16px" class="alert alert-danger" role="alert">
                            {{session()->get('unsuccess-order')}}
                        </div>
                    @endif

                    <table style="width: 100%" id="cart-table">
                        <thead>
                            <tr>
                                <th scope="col">OrderID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total=0;
                                $qty=0;
                            @endphp
                                @foreach ($cart as $cart)
                                    <tr>
                                        <td data-label="OrderID">{{$cart->orderID}}</td>
                                        <td data-label="Name">{{$cart->productName}}</td>
                                        <td data-label="Price">{{$cart->productPrice}}</td>
                                        <td data-label="Quantity">{{$cart->productQty}}</td>
                                        <td data-label="Subtotal">{{$cart->subtotal}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>
                                        @php
                                            $total=App\Models\orders::sum('subtotal');
                                            echo $total+45;
                                        @endphp
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    @endforeach
    
@endsection