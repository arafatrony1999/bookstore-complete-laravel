@extends('layouts.MainLayout')

@section('content')

<section>
    <!-- Carousel wrapper -->
    <div id="carouselDarkVariant" class="carousel slide carousel-fade carousel-dark" data-mdb-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1" aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2" aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="3" aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="4" aria-label="Slide 1"></button>
            <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="5" aria-label="Slide 1"></button>
        </div>

        <!-- Inner -->
        <div class="carousel-inner">

            <!-- Single item -->
            <div class="carousel-item active">
                <img src="images/background.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-md-block">
                    <h3>Big
                        <span>Save</span>
                    </h3>
                    <p>Get flat
                        <span>10%</span> Cashback</p>
                    <a class="button2" href="product.html">Shop Now </a>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="images/banner4.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption">
                    <h3>Healthy
                        <span>Saving</span>
                    </h3>
                    <p>Get Upto
                        <span>30%</span> Off</p>
                    <a class="button2" href="product.html">Shop Now </a>
                </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
                <img src="images/banner4.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption">
                    <h3>Healthy
                        <span>Saving</span>
                    </h3>
                    <p>Get Upto
                        <span>30%</span> Off</p>
                    <a class="button2" href="product.html">Shop Now </a>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="images/banner2.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <!-- Single item -->
            <div class="carousel-item">
                <img src="images/banner1.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/background.jpg" class="d-block w-100" alt="..." />
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselDarkVariant"
            data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-mdb-target="#carouselDarkVariant"
            data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- Carousel wrapper -->
</section>


<section>
    <div class="support-section container">
        <div class="support-card">
            <div class="support-left">
                <i class="fas fa-phone-alt"></i>
            </div>
            <div class="support-right">
                <div class="support-right-p">
                    <p>24/7 COUSTOMER SERVICE</p>
                    <P>+88-01879-923-111</P>
                </div>
            </div>
        </div>
        
        <div class="support-card">
            <div class="support-left">
                <i class="fa fa-plane"></i>
            </div>
            <div class="support-right">
                <div class="support-right-p">
                    <p>FAST SHIPPING SERVICE</p>
                    <P>Country Wide!</P>
                </div>
            </div>
        </div>
        
        <div class="support-card">
            <div class="support-left">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="support-right">
                <div class="support-right-p">
                    <p>EASY RETURN POLICY</p>
                    <P>Money back guarantee</P>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="top-product-section container">
        <div style="background: url(images/background_product1.png)" class="top-product-items">
            <div class="product-name">
                <h1>আনিসুল হকের বই</h1>
                <a href="">SHOP NOW <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </div>
        <div style="background: url(images/background_product2.png)" class="top-product-items with-margin">
            <div class="product-name">
                <h1>আরিফ আজাদ</h1>
                <a href="">SHOP NOW <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </div>
        <div style="background: url(images/background_product3.png)" class="top-product-items">
            <div class="product-name">
                <h1>কম্পিউটার প্রোগ্রামিং</h1>
                <a href="">SHOP NOW <span><i class="fas fa-arrow-right"></i></span></a>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="all-available-catagories">
        @foreach ($getCatagoriesBook as $getCatagoriesBook)
            <a href="/catagory/বিষয়/{{$getCatagoriesBook->bishoyName}}">
                <span>{{$getCatagoriesBook->bishoyName}}</span>
            </a>
        @endforeach
        
        <a href="/catagory"><span>See More</span></a>
    </div>
</section>


<section>
    <div class="products-main-section container">
        <div class="product-main-section-header">
            <span>বই মেলা ২০২০</span>
        </div>
    </div>
    

    <div class="container section-marginTop text-center">
        <div class="row m-2">
            <div id="one" class="owl-carousel mb-4 owl-theme">
                @foreach ($bookfair as $bookfair)
                    <!-- single card  -->
                    <div class="item m-1 card">
                        <div class="text-center">
                            <div class="product-display-img">
                                <img class="pImg" data-id="{{$bookfair->id}}" src="{{$bookfair->productImage}}" alt="Card image cap">
            
                                <i class="fas fa-search openCartBookFair" data-id="{{$bookfair->id}}"></i>
                                <div class="product-cart-button">
                                    <a href="" class="big-cart" data-id="{{$bookfair->id}}">Add to cart </a>
                                    <a href="/product/product_id={{$bookfair->id}}" class="small-cart"><i class="far fa-eye"></i></a>
                                    
                                    @php
                                        if(Cookie::get('uuid')==null){
                                            $sessionID = session()->getId();
                                        }
                                        else{
                                            $sessionID = Cookie::get('uuid');
                                        }
                                        $wish = App\Models\wishList::where('sessionORcookie','=',$sessionID)->where('bookID','=',$bookfair->id)->count();
                                    @endphp
                                    @if ($wish==1)
                                        <a href="" class="small-cart small-wishlist active-wishlist" data-id="{{$bookfair->id}}"><i class="fas fa-heart"></i></a>
                                    @else
                                        <a href="" class="small-cart small-wishlist" data-id="{{$bookfair->id}}"><i class="fas fa-heart"></i></a>
                                    @endif
                            
                                </div>
                            </div>
                            <h5 class="card-title mt-4" data-id="{{$bookfair->id}}">{{$bookfair->bookName}}</h5>
                            <h3 class="price-tag">৳ <span data-id="{{$bookfair->id}}" class="priceWithout">{{$bookfair->bookPrice}}</span>.00</h3>
                        </div>
                    </div>
                    <!-- single card  -->
                @endforeach
            </div>

            <div class="previousBtn">
                <i id="customPrevBtn" class="btn normal-btn fas fa-chevron-left"></i>
            </div>
            <div class="nextBtn">
                <i id="customNextBtn" class="btn normal-btn fas fa-chevron-right"></i>
            </div>

        </div>
    </div>
</section>



<section class="container" style="padding-top: 10rem">
    <div class="all-available-catagories">
        @foreach ($getProkashoniBook as $getProkashoniBook)
            <a href="/catagory/প্রকাশনী/{{$getProkashoniBook->ProkashoniName}}">
                <span>{{$getProkashoniBook->ProkashoniName}}</span>
            </a>
        @endforeach
        
        <a href="/catagory"><span>See More</span></a>
    </div>
</section>


<section>

    <div class="products-main-section container">
        <div class="product-main-section-header">
            <span>উপন্যাস সমূহ</span>
        </div>
    </div>
    

    <div class="container section-marginTop text-center">
        <div class="row m-2">
            <div id="two" class="owl-carousel mb-4 owl-theme">
                @foreach ($catagory2 as $catagory2)
                    <!-- single card  -->
                    <div class="item m-1 card">
                        <div class="text-center">
                            <div class="product-display-img">
                                <img class="pImg" data-id="{{$catagory2->id}}" src="{{$catagory2->productImage}}" alt="Card image cap">
            
                                <i class="fas fa-search openCartBookFair" data-id="{{$catagory2->id}}"></i>
                                <div class="product-cart-button">
                                    <a href="" class="big-cart" data-id="{{$catagory2->id}}">Add to cart </a>
                                    <a href="/product/product_id={{$catagory2->id}}" class="small-cart"><i class="far fa-eye"></i></a>
                                    
                                    @php
                                        if(Cookie::get('uuid')==null){
                                            $sessionID = session()->getId();
                                        }
                                        else{
                                            $sessionID = Cookie::get('uuid');
                                        }
                                        $wish = App\Models\wishList::where('sessionORcookie','=',$sessionID)->where('bookID','=',$catagory2->id)->count();
                                    @endphp
                                    @if ($wish==1)
                                        <a href="" class="small-cart small-wishlist active-wishlist" data-id="{{$catagory2->id}}"><i class="fas fa-heart"></i></a>
                                    @else
                                        <a href="" class="small-cart small-wishlist" data-id="{{$catagory2->id}}"><i class="fas fa-heart"></i></a>
                                    @endif
                            
                                </div>
                            </div>
                            <h5 class="card-title mt-4" data-id="{{$catagory2->id}}">{{$catagory2->bookName}}</h5>
                            <h3 class="price-tag">৳ <span data-id="{{$catagory2->id}}" class="priceWithout">{{$catagory2->bookPrice}}</span>.00</h3>
                        </div>
                    </div>
                    <!-- single card  -->
                @endforeach
            </div>

            <div class="previousBtn">
                <i id="customPrevBtn2" class="btn normal-btn fas fa-chevron-left"></i>
            </div>
            <div class="nextBtn">
                <i id="customNextBtn2" class="btn normal-btn fas fa-chevron-right"></i>
            </div>

        </div>
    </div>
</section>



{{-- product --}}
<section>

    <div class="products-main-section container">
        <div class="product-main-section-header">
            <span>ইংরেজি ভাষার বই</span>
        </div>
    </div>
    

    <div class="container section-marginTop text-center">
        <div class="row m-2">
            <div id="three" class="owl-carousel mb-4 owl-theme">
                @foreach ($product as $product)
                    <!-- single card  -->
                    <div class="item m-1 card">
                        <div class="text-center">
                            <div class="product-display-img">
                                <img class="pImg" data-id="{{$product->id}}" src="{{$product->productImage}}" alt="Card image cap">
            
                                <i class="fas fa-search openCartBookFair" data-id="{{$product->id}}"></i>
                                <div class="product-cart-button">
                                    <a href="" class="big-cart" data-id="{{$product->id}}">Add to cart </a>
                                    <a href="/product/product_id={{$product->id}}" class="small-cart"><i class="far fa-eye"></i></a>
                                    
                                    @php
                                        if(Cookie::get('uuid')==null){
                                            $sessionID = session()->getId();
                                        }
                                        else{
                                            $sessionID = Cookie::get('uuid');
                                        }
                                        $wish = App\Models\wishList::where('sessionORcookie','=',$sessionID)->where('bookID','=',$product->id)->count();
                                    @endphp
                                    @if ($wish==1)
                                        <a href="" class="small-cart small-wishlist active-wishlist" data-id="{{$product->id}}"><i class="fas fa-heart"></i></a>
                                    @else
                                        <a href="" class="small-cart small-wishlist" data-id="{{$product->id}}"><i class="fas fa-heart"></i></a>
                                    @endif
                            
                                </div>
                            </div>
                            <h5 class="card-title mt-4" data-id="{{$product->id}}">{{$product->bookName}}</h5>
                            <h3 class="price-tag">৳ <span data-id="{{$product->id}}" class="priceWithout">{{$product->bookPrice}}</span>.00</h3>
                        </div>
                    </div>
                    <!-- single card  -->
                @endforeach
            </div>

            <div class="previousBtn">
                <i id="customPrevBtn3" class="btn normal-btn fas fa-chevron-left"></i>
            </div>
            <div class="nextBtn">
                <i id="customNextBtn3" class="btn normal-btn fas fa-chevron-right"></i>
            </div>

        </div>
    </div>
</section>



<section>
    
    <div class="many-product-section container">
        <div class="col-md-4">

            <div class="products-main-section container">
                <div class="product-main-section-header">
                    <span>নতুন বই সমূহ</span>
                </div>
            </div>

            @foreach ($newBook as $newBook)
                <a href="/product/product_id={{$newBook->id}}" class="many-item-card">
                    <div class="many-item-card-image">
                        <img src="{{$newBook->productImage}}" alt="">
                    </div>
                    <div class="many-item-card-details">
                        <span class="many-item-name">{{$newBook->bookName}}</span>
                        <span class="many-item-price">৳ {{$newBook->bookPrice}}.00</span>
                    </div>
                </a>
            @endforeach
            
        </div>

        <div class="col-md-4">

            <div class="products-main-section container">
                <div class="product-main-section-header">
                    <span>সাপ্তাহিক সেরা বই সমূহ</span>
                </div>
            </div>

            <a href="#" class="many-item-card">
                <div class="many-item-card-image">
                    <img src="images/product1.png" alt="">
                </div>
                <div class="many-item-card-details">
                    <span class="many-item-name">বেলা ফুরাবার আগে</span>
                    <span class="many-item-price">৳ 245.00</span>
                </div>
            </a>
        </div>

        <div class="col-md-4">

            <div class="products-main-section container">
                <div class="product-main-section-header">
                    <span>বেস্টসেলার বইসমূহ</span>
                </div>
            </div>

            @foreach ($mostSaleBook as $mostSaleBook)
                <a href="/product/product_id={{$mostSaleBook->id}}" class="many-item-card">
                    <div class="many-item-card-image">
                        <img src="{{$mostSaleBook->productImage}}" alt="">
                    </div>
                    <div class="many-item-card-details">
                        <span class="many-item-name">{{$mostSaleBook->bookName}}</span>
                        <span class="many-item-price">৳ {{$mostSaleBook->bookPrice}}.00</span>
                    </div>
                </a>
            @endforeach

        </div>
    </div>

</section>

<section class="devide-area">

</section>







@endsection


@section('script')

@endsection