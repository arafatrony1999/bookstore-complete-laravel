<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/aos.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/mdb.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="{{URL::asset('css/toaster.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/owl.carousel.min.css')}}">

    <!-- custom css -->
    <link rel="stylesheet" href="{{URL::asset('css/header.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/bookfair.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/cart.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/checkout.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/my-account.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/product.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/profile.css')}}">
    <!-- custom css -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Encode+Sans+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Dodum&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" /> --}}
</head>
<body>
    
@include('layouts.Menu')



@yield('content')




<section class="customModal d-none">
    <div class="custom-modal-container">
        <div class="custom-modal-cross">
            <i class="fas fa-times"></i>
        </div>
        <div class="customModalSpinner">
            <div class="d-flex justify-content-center">
                <div class="spinner-border customModal-bs-spinner" role="status"></div>
            </div>
        </div>
        <div class="custom-modal-body d-none">
            <div class="modal-image">

            </div>
            <div class="modal-details d-none">
                <div class="details-alignment">
                    <div class="modal-product-name">

                    </div>
                    <div class="modal-product-writer">

                    </div>
                    <div class="modal-product-price">

                    </div>
                    <div class="modal-cart-details">
                        <form action="/customModalCartUrl" method="post">
                            @csrf
                            <input type="hidden" id="customID" name="customID" value="">
                            <input type="hidden" id="customName" name="customName" value="">
                            <input type="hidden" id="customPrice" name="customPrice" value="">
                            <input type="hidden" id="customImage" name="customImage" value="">
                            <input type="number" name="customQty" id="customQty" value="1">
                            <button type="submit" id="addCartCustomModal">Add to Cart</button>
                        </form>
                    </div>
                    <div class="modal-product-details">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@include('layouts.Footer')


<script src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/mdb.min.js')}}"></script>
<script src="{{URL::asset('js/axios.js')}}"></script>
<script src="{{URL::asset('js/aos.js')}}"></script>
<script src="{{URL::asset('js/collapse.js')}}"></script>
<script src="{{URL::asset('js/onHover.js')}}"></script>
<script src="{{URL::asset('js/regestration.js') }}"></script>
<script src="{{URL::asset('js/cart.js') }}"></script>
<script src="{{URL::asset('js/tata.js') }}"></script>
<script src="{{URL::asset('js/owl.carousel.min.js')}}"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script> --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
<script src="https://kit.fontawesome.com/411c21c790.js" crossorigin="anonymous"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

<script>
    window.addEventListener("scroll", () => {
        document.querySelector("#menu-bar").classList.toggle("sticky", window.scrollY > 50)
    });
</script>

<script>
    $(document).ready(function(){
        $('#openSideBar').on('click',()=>{
            $('.side-bar').addClass('active-side-bar');
            $("body").css("overflow", "hidden");
        });
        $('.fa-times').on('click',()=>{
            $('.side-bar').removeClass('active-side-bar');
            $("body").css("overflow", "scroll");
        });
    })
</script>

<script>
    $(document).ready(function() {
        var one = $("#one");
        var two = $("#two");
        var three = $("#three");
        var four = $("#four");
    
        $('#customNextBtn').click(function() {
            one.trigger('next.owl.carousel');
        });
        $('#customPrevBtn').click(function() {
            one.trigger('prev.owl.carousel');
        });

        
        $('#customNextBtn2').click(function() {
            two.trigger('next.owl.carousel');
        });
        $('#customPrevBtn2').click(function() {
            two.trigger('prev.owl.carousel');
        });
        
        $('#customNextBtn3').click(function() {
            three.trigger('next.owl.carousel');
        });
        $('#customPrevBtn3').click(function() {
            three.trigger('prev.owl.carousel');
        });
        
        $('#customNextBtn4').click(function() {
            four.trigger('next.owl.carousel');
        });
        $('#customPrevBtn4').click(function() {
            four.trigger('prev.owl.carousel');
        });

        one.owlCarousel({
            autoplay:false,
            loop:false,
            // rewind: true,
            dot:true,
            autoplayHoverPause:true,
            autoplaySpeed:100,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });
    
        two.owlCarousel({
            autoplay:false,
            loop:false,
            dot:true,
            autoplayHoverPause:true,
            autoplaySpeed:100,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });
        
        three.owlCarousel({
            autoplay:false,
            loop:false,
            dot:true,
            autoplayHoverPause:true,
            autoplaySpeed:100,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });

        
        four.owlCarousel({
            autoplay:false,
            loop:false,
            dot:true,
            autoplayHoverPause:true,
            autoplaySpeed:100,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:5
                }
            }
        });
    });
</script>


{{-- <script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script> --}}

{{-- Home Page CUSTOM MODAL  --}}
<script>
    $('.openCartBookFair').on('click',function(e){
        e.preventDefault();
        $('.customModal').removeClass('d-none');

        var bookFairCustomModalID = $(this).data('id');
        var bookFairCustomModalURL = '/bookFairCustomModal';
        var bookFairCustomModalObject = {customModalID:bookFairCustomModalID};
        axios.post(bookFairCustomModalURL,bookFairCustomModalObject)
        .then(function(response){
            var customModajsonData=response.data;

            $('#customID').val(customModajsonData[0].id);
            $('#customName').val(customModajsonData[0].bookName);
            $('#customPrice').val(customModajsonData[0].bookPrice);
            $('#customImage').val(customModajsonData[0].productImage);
            
            $('.modal-image').html("<img src='"+customModajsonData[0].productImage+"'>")
            $('.modal-product-name').html(customModajsonData[0].bookName);
            $('.modal-product-writer').html(customModajsonData[0].bookWriter);
            $('.modal-product-price').html(customModajsonData[0].bookPrice + ".00 TK");



            $('#addCartCustomModal').attr('data-id',customModajsonData[0].id);
            
            $('.modal-image').html("<img src='"+customModajsonData[0].productImage+"'>")
            $('.modal-product-name').html(customModajsonData[0].bookName);
            $('.modal-product-writer').html(customModajsonData[0].bookWriter);
            $('.modal-product-price').html(customModajsonData[0].bookPrice + ".00 TK");
            $('.modal-product-details').html(
                "Catagories : "+ 
                customModajsonData[0].bookProkashoni + ", " +
                customModajsonData[0].bookWriter + ", " +
                customModajsonData[0].bookCatagory
            );

            $('.customModalSpinner').addClass('d-none');
            $('.modal-details').removeClass('d-none');
            $('.custom-modal-body').removeClass('d-none');
        })
        .catch(function(error){
            alert("Sorry! Something went wrong. Try again!");
        });
    });


    $('.custom-modal-cross').on('click',function(){
        $('.customModal').addClass('d-none');
        $('.modal-image').html("");
        $('.modal-product-name').html("");
        $('.modal-product-price').html("");
        $('.modal-product-details').html("");

        $('.customModalSpinner').removeClass('d-none');
        if(!$('.modal-details').hasClass('d-none')){
            $('.modal-details').addClass('d-none');
        }
    });
</script>
{{-- Home Page CUSTOM MODAL  --}}


<script>
    $('.small-wishlist').on('click',function(e){
        e.preventDefault();
        var wishDataIDcatch = $(this).data('id');
        var wishListObject = {wishDataID:wishDataIDcatch};
        
        if($(this).hasClass('active-wishlist')){
            var wishListURL = '/wishListDelete';
        }
        else{
            var wishListURL = '/wishListAdd';
        }
        axios.post(wishListURL,wishListObject)
        .then(function(response){
            if(response.status==200){
                var id = response.data;
                $('.small-wishlist[data-id='+id+']').toggleClass('active-wishlist');
            }
        })
        .catch(function(error){
            alert('Failed!')
        });
    })
</script>


<script>
    $('.big-cart').on('click',function(e){
        e.preventDefault();
        var updateSpinner = "<div class='d-flex align-big-cart justify-content-center'><div class='spinner-border spinner-border-sm' role='status'></div></div>";
        var cartDataIDcatch = $(this).data('id');
        var cartItemName = $('.card-title[data-id='+cartDataIDcatch+']').html();
        var cartItemPrice = $('.priceWithout[data-id='+cartDataIDcatch+']').html();
        var cartItemImage = $('.pImg[data-id='+cartDataIDcatch+']').attr('src');
        $(this).html(updateSpinner);
        var cartListObject = {
            cartDataIDcatch:cartDataIDcatch,
            cartItemName:cartItemName,
            cartItemPrice:cartItemPrice,
            cartItemImage:cartItemImage
        };
        // alert(cartDataIDcatch+cartItemName+cartItemPrice+cartItemImage)
        var cartURL = '/cartURL';
        axios.post(cartURL,cartListObject)
        .then(function(response){
            if(response.status==200){
                var fontAwesome = "<i style='padding-left:5px' class='fas fa-check'></i>";
                var id = response.data;
                $('.big-cart[data-id='+id+']').html("Add to Cart"+fontAwesome);
            }
            else{
                alert('Something went wrong1');
            }
            getCartItemTotalData();
        })
        .catch(function(error){
            alert('Something went wrong2');
        });
    });
</script>


<script>
    getCartItemTotalData();

    function getCartItemTotalData(){
        axios.get('/getCartItemTotalData')
        .then(function(response){
            var data = response.data;
            $('.cart-count').html(data);
        })
        .catch(function(error){
            alert('Sorry! Server not responding. Try again after some time.')
        });
    }
</script>

@yield('script')

</body>
</html>