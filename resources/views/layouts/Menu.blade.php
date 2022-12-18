<section>
    <div class="main-menu">

        <div class="top-details">
            <div class="top-details-left">
                <a href="mailto:"><i class="far fa-envelope-open"><span>info@myshop.com</span></i></a>
                <a href="tel:+"><i class="fas fa-phone-alt"><span>01879923111</span></i></a>
            </div>
            <div class="top-details-right">
                <a href="{{URL('/my')}}"><i class="fas fa-heart"><span>Wishlist</span></i></a>
                <a href="{{URL('/profile')}}"><i class="fas fa-user-circle"><span>My Account</span></i></a>
                <a href="/checkout"><i class="fas fa-shopping-cart"><span>Checkout</span></i></a>
            </div>
        </div>

        <div class="logo-details-and-others">
            <div class="main-logo-text">
                <img src="images/pngegg.png" alt="">
                <h2>Arafat Rony</h2>
            </div>
            <div class="cart-button">
                <a href="{{URL('/cart')}}">
                    CART
                    <span><i class="fas fa-shopping-bag"></i></span>
                    <span class="cart-count">

                    </span>
                </a>
            </div>
        </div>

        <div class="menu-bar" id="menu-bar">
            <div class="menu-bar-items">
                <a class="active" href="{{URL('/')}}">প্রথম পাতা</a>
                <a href="{{URL('/')}}">বই মেলা ২০২০</a>

                <div class="frontModal" id="lekhok">
                    লেখক
                    <div class="hover-lekhok">
                        @php
                            $writers = \App\Models\writer_name::all();
                        @endphp

                        
                        @foreach($writers as $writers)
                            <a class="modalLinks" href="#">{{$writers->WriterName}}</a>
                        @endforeach
                    </div>
                </div>

                <div class="frontModal" id="prokashoni">
                    প্রকাশনী
                    <div class="hover-prokashoni">
                        @php
                            $prokashoni = \App\Models\prokashoni_name::all();
                        @endphp

                        
                        @foreach($prokashoni as $prokashoni)
                            <a class="modalLinks" href="/catagory/প্রকাশনী/{{$prokashoni->ProkashoniName}}">{{$prokashoni->ProkashoniName}}</a>
                        @endforeach
                    </div>
                </div>

                <div class="frontModal" id="bishoy">
                    বিষয়
                    <div class="hover-bishoy">
                        @php
                            $bishoy = \App\Models\bishoy_name::all();
                        @endphp

                        
                        @foreach($bishoy as $bishoy)
                            <a class="modalLinks" href="/catagory/বিষয়/{{$bishoy->bishoyName}}">{{$bishoy->bishoyName}}</a>
                        @endforeach
                    </div>
                </div>
                
                <a href="">যোগাযোগ</a>
            </div>


            <div class="res-top-menu">
                <div class="left-section res">
                    <span>Arafat Rony</span>
                </div>

                <div class="right-section res">
                    <span><i id="openSideBar" class="fas fa-bars"></i></span>
                </div>
            </div>

            <div class="menu-bar-search-bar">
                <input type="text">
                <button class="btn"><i class="fas fa-search"></i></button>
            </div>
        </div>


        <div class="side-bar">
            <div class="side-bar-header">
                <div class="side-bar-title">
                    <h2>Arafat Rony</h2>
                    <span><i class="fas fa-times"></i></span>
                </div>
            </div>
            <a class="active" href="">প্রথম পাতা</a>
            <a href="">বই মেলা ২০২০</a>
            <a href="#" id="res-lekhok">লেখক<span class="arrowRight"><i class="fas fa-chevron-right"></i></span></a>
            <a href="#" id="res-prokashoni">প্রকাশনী<span class="arrowRight"><i class="fas fa-chevron-right"></i></span></a>
            <a href="#" id="res-bishoy">বিষয়<span class="arrowRight"><i class="fas fa-chevron-right"></i></span></a>
            <a href="">যোগাযোগ</a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="Modal-lekhok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">লেখক</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php
                            $writers_res = \App\Models\writer_name::all();
                        @endphp
                        
                        @foreach($writers_res as $writers)
                            <a class="res-modalLinks" href="#">{{$writers->WriterName}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="Modal-prokashoni" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">প্রকাশনী</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php
                            $prokashoni_res = \App\Models\prokashoni_name::all();
                        @endphp
                        
                        @foreach($prokashoni_res as $prokashoni)
                            <a class="res-modalLinks" href="#">{{$prokashoni->ProkashoniName}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="Modal-bishoy" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">বিষয়</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @php
                            $bishoy_res = \App\Models\bishoy_name::all();
                        @endphp
                        
                        @foreach($bishoy_res as $bishoy)
                            <a class="res-modalLinks" href="#">{{$bishoy->bishoyName}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>