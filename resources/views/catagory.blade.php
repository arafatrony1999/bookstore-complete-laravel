@extends('layouts.MainLayout')

@section('content')

<section class="container">
    <div class="flex-container">
        <div class="inside-left">
            <h2 class="heading-left">browse books</h2>
            <div class="browse-books">
                @foreach ($bishoyName as $bishoyName)
                    <div class="browse-books-items">
                        <a href="/catagory/{{$bishoyName->bishoyName}}" style="font-size: 14px"><i class="fas fa-book fa-rotate-45"></i>{{$bishoyName->bishoyName}}</a>
                    </div>
                @endforeach
            </div>
        </div>


        <div class="inside-right">
            <h1 style="padding-top:30px">
                Bishoy Name
            </h1>
            <div class="inside-right-headings">
                <div class="right-heading">
                    <h3>showing 1-10 of 100 items</h3>
                    <select name="" id="">
                        <option value="">Sort by popularity</option>
                        <option value="">Sort by average rating</option>
                        <option value="">Sort by latest</option>
                        <option value="">Sort by price:low to high</option>
                        <option value="">Sort by price:low to high</option>
                    </select>
                </div>

                <div class="left-heading">
                    <div id="grid-icon" class="collapse-options active-icon">
                        <i class="fas fa-th-large icon-active"></i>
                    </div>
                    <div id="list-icon" class="collapse-options">
                        <i class="fas fa-list"></i>
                    </div>
                </div>
            </div>

            <div class='right-items'>
            </div>



        </div>
    </div>
</section>


@endsection

@section('script')

<script>
    loadItem();
    function loadItem(){
        axios.get('/itemJson')
        .then(function(response){

            var jsonData = response.data;

            $.each(jsonData,function(i){
                $("<div class='right-items-single-card'>").html(
                        "<div class='product-display-img'>"+
                            "<img src='"+jsonData[i].productImage+"' alt='Card image cap'>"+
                            "<div class='product-cart-button'>"+
                                "<a href='/product/product_id="+jsonData[i].id+"' class='big-cart2'>Quick View</a>"+
                                "<a href='#' class='small-cart2'><i class='fas fa-bars'></i></a>"+
                                "<a href='#' class='small-cart2'><i class='fas fa-heart'></i></a>"+
                            "</div>"+
                        "</div>"+
                        "<div class='name-and-price'>"+
                            "<h5 class='card-title mt-4'>"+jsonData[i].bookName+"</h5>"+
                            "<h3 class='price-tag'>"+jsonData[i].bookWriter+"</h3>"+
                            "<h3 class='price-tag'>৳ "+jsonData[i].bookPrice+".00</h3>"+
                        "</div>"
                ).appendTo('.right-items');
            });
        })
        .catch(function(error){
            alert('hello world')
        });
    }
</script>
    
@endsection