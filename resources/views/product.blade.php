@extends('layouts.MainLayout')

@section('content')


@if (session()->has('success_review'))
    <div class="review_alart alert alert-success" role="alert">
        {{session()->get('success_review')}}
    </div>
@endif
@if (session()->has('error_review'))
    <div class="review_alart alert alert-danger" role="alert">
        {{session()->get('error_review')}}
    </div>
@endif

@foreach ($product as $product)
<section>
    <div class="product_cart_container">
        <div class="side1">
            <div class="side1_image">
                <img src="{{$product->productImage}}" alt="">
            </div>
            <div class="side1_others">
                <h1>{{$product->bookName}}</h1>
                <p></p>
                <span>By : </span><a href="#" class="side1_links">{{$product->bookWriter}}</a> <br>
                <p></p>
                <p></p>
                <span>Catagory : </span><span>{{$product->bookProkashoni}}, {{$product->bookCatagory}}</span>
                <p></p>
                <p></p>
                <h1>TK. {{$product->bookPrice}}</h1>
                <p></p>
                <p></p>
                <span>
                    @if ($product->stockAvail=='In Stock')
                        <i class="fas fa-check-circle" style="color: #33c24d;"> </i> 
                        {{$product->stockAvail}} (only {{$product->productItem}} copies left)
                    @else
                        <i class="far fa-times-circle" style="color: red;"></i>
                        {{$product->stockAvail}}
                    @endif
                </span>
                <p></p>
                <p></p>
                <div class="all-two-btn">
                    <button class="read_now_button">একটু পড়ে দেখুন</button>
                    <form action="/customModalCartUrl" method="POST">
                        @csrf
                        <input type="hidden" name="customID" value="{{$product->id}}">
                        <input type="hidden" name="customName" value="{{$product->bookName}}">
                        <input type="hidden" name="customPrice" value="{{$product->bookPrice}}">
                        <input type="hidden" name="customImage" value="{{$product->productImage}}">
                        <input type="hidden" name="customQty" value="1">
                        <button type="submit" class="product_add_cart_button">Add to Cart</button>
                    </form>
                </div>
            </div>
            <p></p><p></p>
        </div>

        <div class="side2">
            
            <h3><i class="fas fa-hand-holding-usd"></i>Cash on delivery</h3>
            <h3><i class="fas fa-redo"></i>7 Days easy returns</h3>
            <h3><i class="fas fa-truck"></i>Delivery Charge Tk. 50(Online Order)</h3>

            
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{URL::asset('images/product1.png')}}" alt="">
                    </div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="product_section2">
        <h1>Product Specification & Summary</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Summery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Author</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <span>
                    @if ($product->productDescription=='')
                        <div class="alert alert-danger" role="alert">
                            Sorry! No data available.
                        </div>
                    @else 
                        {{$product->productDescription}}
                    @endif
                </span>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <table style="width:100%">
                    <tr>
                        <th>Title</th>
                        <td>{{$product->bookName}}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{$product->bookWriter}}</td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td>{{$product->bookProkashoni}}</td>
                    </tr>
                    <tr>
                        <th>ISBN</th>
                        <td>{{$product->ISBN}}</td>
                    </tr>
                    <tr>
                        <th>Edition</th>
                        <td>{{$product->productEdition}}, Published : {{$product->productPublishYear}}</td>
                    </tr>
                    <tr>
                        <th>Number of Pages</th>
                        <td>{{$product->productPage}}</td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>{{$product->productCountry}}</td>
                    </tr>
                    <tr>
                        <th>Language</th>
                        <td>{{$product->productLanguage}}</td>
                    </tr>
                  </table>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <span>
                    লেখক মোশতাক আহমেদ এর জন্ম ১৯৭৫ সালের ৩০ ডিসেম্বর, ফরিদপুর জেলায়। পেশায় একজন অতিরিক্ত ডিআইজি হওয়া সত্ত্বেও লেখালেখির প্রতি তাঁর আগ্রহ প্রচুর। এ পর্যন্ত সায়েন্স ফিকশন নিয়েই সবচেয়ে বেশি লিখেছেন। বাংলা সায়েন্স ফিকশন জগতে তার পোক্ত একটি অবস্থান সৃষ্টি হয়েছে। এছাড়াও মোশতাক আহমেদ এর বই সমূহ ভৌতিক, প্যারাসাইকোলজি, মুক্তিযুদ্ধ, কিশোর ক্ল্যাসিক, ভ্রমণ ইত্যাদি জঁনরাতে বিভক্ত। যেকোনো একটি বিষয়ে সীমাবদ্ধ না থেকে তিনি বিভিন্ন বিষয় নিয়ে লিখতেই পছন্দ করেন। 
                    মোশতাক আহমেদ এর বই সমগ্র সংখ্যায় পঞ্চাশ পেরিয়েছে। তাঁর প্রথম প্রকাশিত বই ছিল ‘জকি’। এটি একটি জীবনধর্মী উপন্যাস। ২০০৫ সালে এটি প্রকাশিত হয়।
                    মোশতাক আহমেদ পড়াশোনা করেছেন ঢাকা বিশ্ববিদ্যালয়ে। প্রথমে ফার্মেসি বিভাগে, পরে আইবিএতে। পরবর্তী সময়ে ইংল্যান্ডের লেস্টার বিশ্ববিদ্যালয় থেকে অপরাধবিজ্ঞান থেকে মাস্টার্স ডিগ্রী অর্জন করেন। পড়াশোনার খাতিরেই হোক বা কর্মজীবনের তাগিদেই হোক, ব্যক্তিগত জীবনে তিনি অনেক ভ্রমণ করেছেন। সেসব ভ্রমণকাহিনীর আশ্রয়ে তাই ক্রমেই সমৃদ্ধ হয়েছে তাঁর লেখা ভ্রমণকাহিনীগুলোও।
                    তাঁর সৃজনশীল কর্মকাণ্ড শুধু লেখালেখিতেই গণ্ডিবদ্ধ নয়। ১৯৭১ সালের ২৫শে মার্চ রাজারবাগের পুলিশ ও পাকিস্তানী হানাদারবাহিনীর মধ্যে একটি যুদ্ধ সংঘটিত হয়েছিল। সে ঘটনার ওপর ভিত্তি করে মোশতাক আহমেদ  ‘মুক্তিযুদ্ধের প্রথম প্রতিরোধ’ নামে একটি তথ্যচিত্র নির্মাণ করেন। এটি ২০১৩ সালের মার্চ মাসে মুক্তি পায়।
                    তাঁর পুরস্কারের ঝুলিতে এ পর্যন্ত রয়েছে ২০১৩ সালের কালি ও কলম সাহিত্য পুরস্কার, ২০১৪ সালের ছোটদের মেলা সাহিত্য পুরস্কার, ২০১৪ সালের কৃষ্ণকলি সাহিত্য পুরস্কার, ২০১৫ সালের সিটি আনন্দ আলো পুরস্কার এবং সর্বশেষ সংযুক্তি হিসেবে সায়েন্স ফিকশন বিষয়ে বিশেষ অবদান রাখার জন্য বাংলা একাডেমি সাহিত্য পুরস্কার-২০১৭।
                </span>
            </div>
        </div>

        <div class="report-section">
            <i class="fas fa-exclamation-triangle"></i><a href="#">Report False Information</a>
        </div>
    </div>
</section>

@endforeach

<section>
    <div class="products-main-section container">
        <div class="product-main-section-header">
            <span>বই মেলা ২০২০</span>
        </div>
    </div>
    

    <div class="container section-marginTop text-center">
        <div class="row m-2">
            <div id="one" class="owl-carousel mb-4 owl-theme">
                @foreach ($catagory as $catagory)
                    <!-- single card  -->
                    <div class="item m-1 card">
                        <div class="text-center">
                            <div class="product-display-img">
                                <img class="pImg" data-id="{{$catagory->id}}" src="{{$catagory->productImage}}" alt="Card image cap">
            
                                <i class="fas fa-search openCartBookFair" data-id="{{$catagory->id}}"></i>
                                <div class="product-cart-button">
                                    <a href="" class="big-cart" data-id="{{$catagory->id}}">Add to cart </a>
                                    <a href="/product/product_id={{$catagory->id}}" class="small-cart"><i class="far fa-eye"></i></a>
                                    
                                    @php
                                        if(Cookie::get('uuid')==null){
                                            $sessionID = session()->getId();
                                        }
                                        else{
                                            $sessionID = Cookie::get('uuid');
                                        }
                                        $wish = App\Models\wishList::where('sessionORcookie','=',$sessionID)->where('bookID','=',$catagory->id)->count();
                                    @endphp
                                    @if ($wish==1)
                                        <a href="" class="small-cart small-wishlist active-wishlist" data-id="{{$catagory->id}}"><i class="fas fa-heart"></i></a>
                                    @else
                                        <a href="" class="small-cart small-wishlist" data-id="{{$catagory->id}}"><i class="fas fa-heart"></i></a>
                                    @endif
                                </div>
                            </div>
                            <h5 class="card-title mt-4" data-id="{{$catagory->id}}">{{$catagory->bookName}}</h5>
                            <h3 class="price-tag">৳ <span data-id="{{$catagory->id}}" class="priceWithout">{{$catagory->bookPrice}}</span>.00</h3>
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

<section>
    <div class="review-container">
        <h1>Reviews</h1>
        @php
            $id = $product->id;

            $reviews = App\Models\review::where('productID','=',$id)->get();
        @endphp

        @if ($reviews->count()==0)
            <div class="alert alert-danger" role="alert">
                <span>No reviews of this Book. Be the first one to write a review of this book.</span>
            </div>
        @endif

        @foreach ($reviews as $reviews)
            <div class="reviews-main-container">
                <div class="reviews-profile">
                    <div class="reviews-profile-pic">
                        <img src="{{URL::asset('images/avatar.png')}}" alt="">
                    </div>
                    <div class="reviews-profile-names">
                        <h3>{{$reviews->user_name}}</h3>
                        <h6>{{$reviews->Review_time}}</h6>
                    </div>
                </div>
                <div class="reviews-text">
                    <span>{{$reviews->review_text}}</span>
                </div>

                <div class="was-this">
                    <span style="color: green;">Was this review helpful to you?</span>
                </div>

                <div class="review-icon">
                    @php
                        $cookieID = Cookie::get('uuid');
                        $userID = App\Models\reg::where('userAuth',$cookieID)->pluck('userID')->first();
                        $countLikes = App\Models\review_reaction::where('productID','=',$reviews->productID)->where('review_id','=',$reviews->review_id)->where('action','=','liked')->count();
                        $countDislikes = App\Models\review_reaction::where('productID','=',$reviews->productID)->where('review_id','=',$reviews->review_id)->where('action','=','disliked')->count();
                    @endphp
                    <p>
                        <span>Likes :</span>
                        <span class="likes-count" data-review="{{$reviews->review_id}}" data-count="{{$countLikes}}">{{$countLikes}}</span>
                        <span>Disikes :</span>
                        <span class="dislikes-count" data-review="{{$reviews->review_id}}" data-count="{{$countDislikes}}">{{$countDislikes}}</span>
                    </p>
                    
                    @if (Cookie::get('uuid')==null)
                        <span onclick="$('.hidden-warning2').removeClass('d-none')">
                            <i class="far fa-thumbs-up"></i>
                        </span>

                        <span onclick="$('.hidden-warning2').removeClass('d-none')">
                            <i class="far fa-thumbs-down"></i>
                        </span>
                        <p class="d-none hidden-warning2">You need to login first. <a href="/my-account" target="_blank">Login or Regestration here.</a></p>
                    @else
                        <span>
                            @php
                                $checkLikeAction = App\Models\review_reaction::where('productID','=',$reviews->productID)->where('review_id','=',$reviews->review_id)->where('userID','=',$userID)->where('action','=','liked')->count();
                            @endphp
                            @if ($checkLikeAction==0)
                                <i data-id="{{$reviews->productID}}" id="r-like" data-review="{{$reviews->review_id}}" class="fas fa-thumbs-up r-like"></i>
                            @else
                                <i data-id="{{$reviews->productID}}" id="r-like" data-review="{{$reviews->review_id}}" class="fas fa-thumbs-up r-like done-like"></i>
                            @endif
                        </span>

                        <span>
                            @php
                                $checkDislikeAction = App\Models\review_reaction::where('productID','=',$reviews->productID)->where('review_id','=',$reviews->review_id)->where('userID','=',$userID)->where('action','=','disliked')->count();
                            @endphp
                            @if ($checkDislikeAction==0)
                                <i data-id="{{$reviews->productID}}" id="r-dislike" data-review="{{$reviews->review_id}}" class="fas fa-thumbs-down r-dislike"></i>
                            @else
                                <i data-id="{{$reviews->productID}}" id="r-dislike" data-review="{{$reviews->review_id}}" class="fas fa-thumbs-down r-dislike done-dislike"></i>
                            @endif
                        </span>
                    @endif

                </div>
            </div>
        @endforeach

    </div>

    <div class="review-container review-write-container">
        <form action="/submitReview" method="post">
            @csrf
            <div class="form-group">
                <label for="review">Write a review of this book </label>
                <textarea class="form-control" name="review" id="review" rows="4"></textarea>
            </div>
            <input type="hidden" name="productID" value="{{$product->id}}">
            <input type="hidden" name="productName" value="{{$product->bookName}}">
            @if (Cookie::get('uuid')==null)
                <button onclick="$('#hidden-warning').removeClass('d-none')" type="button" class="btn btn-info">Submit Review</button>
                <p class="d-none" id="hidden-warning">You need to login first. <a href="/my-account" target="_blank">Login or Regestration here.</a></p>
            @else
                <button type="submit" class="btn btn-info">Submit Review</button>
            @endif
        </form>
    </div>

</section>

@endsection


@section('script')

<script>
    $('.r-like').on('click',function(){
        var thisis = $(this);
        var id = thisis.data('id');
        var review_id = thisis.data('review');
        
        var url = '/likeReview';
        var data = {id:id,review_id:review_id};

        var likesCount = $('.likes-count[data-review='+review_id+']').html();

        likesCount = parseInt(likesCount);

        // alert(typeof likesCount);

        if($('.r-like[data-review='+review_id+']').hasClass('done-like')){
            var likesCount = likesCount-1;
        }
        else{
            var likesCount = likesCount+1;
        }
        $('.likes-count[data-review='+review_id+']').html(likesCount);


        axios.post(url,data)
        .then(function(response){
            if(response.data==1){
                if($('.r-dislike[data-review='+review_id+']').hasClass('done-dislike')){
                    var dislikesCount = $('.dislikes-count[data-review='+review_id+']').html();
                    var dislikesCount = parseInt(dislikesCount);

                    $('.r-dislike[data-review='+review_id+']').removeClass('done-dislike');
                    var dislikesCount = dislikesCount-1;
                }
                $('.dislikes-count[data-review='+review_id+']').html(dislikesCount);
                
                thisis.toggleClass('done-like');
            }
            else{
                alert('Something went wrong');
            }
        })
        .catch(function(error){
                alert('Something went wrong');
        });
    });
</script>

<script>
    $('.r-dislike').on('click',function(){
        var thisis = $(this);
        var id = thisis.data('id');
        var review_id = thisis.data('review');
        
        var url = '/dislikeReview';
        var data = {id:id,review_id:review_id};

        var dislikesCount = $('.dislikes-count[data-review='+review_id+']').html();

        dislikesCount = parseInt(dislikesCount);

        // alert(typeof likesCount);

        if($('.r-dislike[data-review='+review_id+']').hasClass('done-dislike')){
            var dislikesCount = dislikesCount-1;
        }
        else{
            var dislikesCount = dislikesCount+1;
        }
        $('.dislikes-count[data-review='+review_id+']').html(dislikesCount);


        axios.post(url,data)
        .then(function(response){
            if(response.data==1){
                if($('.r-like[data-review='+review_id+']').hasClass('done-like')){
                    var likesCount = $('.likes-count[data-review='+review_id+']').html();
                    var likesCount = parseInt(likesCount);
                    
                    $('.r-like[data-review='+review_id+']').removeClass('done-like');
                    var likesCount = likesCount-1;
                }
                $('.likes-count[data-review='+review_id+']').html(likesCount);
                
                thisis.toggleClass('done-dislike');
            }
            else{
                alert('Something went wrong');
            }
        })
        .catch(function(error){
                alert('Something went wrong');
        });
    });
</script>


{{-- <script>
    getLikesDislikesData();

    function getLikesDislikesData(){
        axios.get('/getLikesDislikesData')
        .then(function(response){
            var data = response.data;
            $('.cart-count').html(data);
        })
        .catch(function(error){
            alert('Sorry! Server not responding. Try again after some time.')
        });
    }
</script> --}}

@endsection