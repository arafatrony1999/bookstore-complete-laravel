@extends('layouts.MainLayout')

@section('content')

<section>
    <div class="page-title">
        <h1>Cart</h1>
        <div class="page-dir">
            <span>home</span>
            <span> / </span>
            <span class="current-pag">Cart</span>
        </div>
    </div>
</section>


<section class="container">

    @if (session()->has('success'))
        <div style="font-size: 16px" class="alert alert-primary" role="alert">
            {{session()->get('success')}}
        </div>
    @endif

    @if (session()->has('error'))
        <div style="font-size: 16px" class="alert alert-danger" role="alert">
            {{session()->get('error')}}
        </div>
    @endif


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
    <div class="cart-table-footer">
        <div class="table-footer-left">
            <input type="text" name="" id="" placeholder="coupon code">
            <button>apply coupon</button>
        </div>
        <div class="table-footer-right">
            <button>update cart</button>
        </div>
    </div>
</section>
<section class="container">
    <div class="cart-count1">
        <div class="this-section-header">
            <h1>Cart totals</h1>
        </div>
        <div class="cart-total-single-row">
            <div class="cart-total-left">
                <h3>Subtotal</h3>
            </div>
            <div class="cart-total-right">
                <h3>৳ {{$total}}.00</h3>
            </div>
        </div>

        <div class="cart-total-single-row">
            <div class="cart-total-left">
                <h3>Shipping</h3>
            </div>
            <div class="cart-total-right">
                <h3>flat rate: <span style="color: red;">৳ 45.00</span></h3>
                <h3>Estimate for <span style="font-weight: bolder;">Dhaka</span> . </h3>
                <button id="cart-total-collapse">Change address <span class="addChange"><i class="fas fa-truck"></i></span></button>
                
                <div class="before-click">
                    <select name="" id="">
                        <option value="">Afghanistan</option>
                        <option value="">Australia</option>
                        <option value="">England</option>
                        <option value="">America</option>
                        <option value="">Argentina</option>
                        <option value="" selected>Bangladesh</option>
                        <option value="">India</option>
                        <option value="">Pakistan</option>
                    </select>
                    <select name="" id="">
                        <option value="">Sylhet</option>
                        <option value="">Barisal</option>
                        <option value="">Noakhali</option>
                        <option value="">Rajsahi</option>
                        <option value="">Rangamati</option>
                        <option value="" selected>Dhaka</option>
                        <option value="">Comilla</option>
                        <option value="">Chittagong</option>
                        <option value="">Chandpur</option>
                    </select>
                    <input type="text"  name="" id="" placeholder="Town / City">
                    <input type="text" name="" id="" placeholder="Postcode / ZIP">
                    <button>Update Cart</button>
                </div>
            </div>
        </div>
        <div class="cart-total-single-row">
            <div class="cart-total-left">
                <h3>Total</h3>
            </div>
            <div class="cart-total-right">
                <h3>৳ {{$total+45}}.00</h3>
            </div>
        </div>
    </div>
</section>

<section class="container">
    <div class="cart-final-buttons">
        <div class="final-left">
            <a href="/checkout">Proceed to checkout</a>
        </div>
        <div class="final-right">
            <a href="">Continue shopping</a>
        </div>
    </div>
</section>



@endsection