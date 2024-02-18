@extends('layouts.main')

@section('content')
<link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet">
<!-- Main Style CSS -->
<link href="{{asset('assets/css/product_slider.css')}}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <div class="product-large-slider slick-arrow-style_2">
               
                <div class="pro-large-img ">
                    <img src="{{asset('storage/images/1706620446.jpg')}}" alt=""/>
                </div>
                <div class="pro-large-img">
                    <img src="{{asset('storage/images/1706620475.jpg')}}" alt=""/>
                </div>
                <div class="pro-large-img">
                    <img src="{{asset('storage/images/1706620516.jpg')}}" alt=""/>
                </div>
                 <div class="pro-large-img">
                    <img src="{{asset('storage/images/1706620642.jpg')}}" alt=""/>
                </div>
                <div class="pro-large-img">
                    <img src="{{asset('storage/images/1706621087.jpg')}}" alt=""/>
                </div>
                <div class="pro-large-img">
                    <img src="{{asset('storage/images/1706960955.jpg')}}" alt=""/>
                </div>
                
            </div>
            <div class="pro-nav slick-padding2 slick-arrow-style_2">
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706620446.jpg')}}" alt="" /></div>
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706620475.jpg')}}" alt="" /></div>
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706620516.jpg')}}" alt="" /></div>
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706620642.jpg')}}" alt="" /></div>
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706621087.jpg')}}" alt="" /></div>
                <div class="pro-nav-thumb"><img src="{{asset('storage/images/1706960955.jpg')}}" alt="" /></div>
            </div>
        </div>
    </div>
</div>

@endsection
    
