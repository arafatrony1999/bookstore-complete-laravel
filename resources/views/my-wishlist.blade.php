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
                        <a href="/profile">My Account</a>
                        <a href="/profile/my-orders">My Orders</a>
                        <a href="/cart">My Cart items</a>
                        <a href="/profile/my-wishlist" class="an-active">My Wishlist</a>
                        <a href="#">My Reviews</a>
                        <a href="#">My Account</a>
                    </div>
                    <a href="/signout" class="last-anchor"><span>Sign Out</span></a>
                </div>
                <div class="profile-right">
                    <h2>My Wishlist</h2>
                    <div class="wishlist-items">
                        @foreach ($wish as $wish)
                            @php
                                $wishlistItems = App\Models\product_modal::where('id','=',$wish->bookID)->get();
                            @endphp
                            @foreach ($wishlistItems as $wishlistItems)
                                <div class="right-items-single-card">
                                    <div class="product-display-img">
                                        <img src="{{$wishlistItems->productImage}}" alt="Card image cap">
                                        <div class="product-cart-button">
                                            <a href="/product/product_id={{$wishlistItems->id}}" class="big-cart2">Quick View</a>
                                            <a href="#" class="small-cart2 openCartBookFair" data-id="{{$wishlistItems->id}}"><i class="fas fa-search"></i></a>
                                            @php
                                                $sessionID = Cookie::get('uuid');
                                                $wish = App\Models\wishList::where('sessionORcookie','=',$sessionID)->where('bookID','=',$wishlistItems->id)->count();
                                            @endphp
                                            @if ($wish==1)
                                                <a href="" class="small-cart small-wishlist active-wishlist" data-id="{{$wishlistItems->id}}"><i class="fas fa-heart"></i></a>
                                            @else
                                                <a href="" class="small-cart small-wishlist" data-id="{{$wishlistItems->id}}"><i class="fas fa-heart"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="name-and-price">
                                        <h5 class="card-title mt-4">{{$wishlistItems->bookName}}</h5>
                                        <h3 class="price-tag">{{$wishlistItems->bookWriter}}</h3>
                                        <h3 class="price-tag">৳ {{$wishlistItems->bookPrice}}.00</h3>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

    @endforeach
    
@endsection