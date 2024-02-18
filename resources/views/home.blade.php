@extends('layouts.main')

@section('content')
<div class="container contant">
    @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3 col-6">
                <div class="card">
                    <a href="{{url('Product/')}}/{{$product->id}}">
                    <img data-src="{{url('storage/images/' . $product->img )}}" class="card-img-top lazy" alt="...">
                    </a>
                    <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <div class="col-sm-6"><h6 class="product-price">TK <span>{{$product->price}}</span></h6></div>
                    <div class="d-grid">
                        <a href="{{route('add.to.cart',$product->id)}}" class="btn btn-success">অর্ডার করুন</a>
                    </div>
                    
                    </div>
                </div>
            </div>
        @endforeach
        
    </div>
    {{-- <div class="row">
        <div class="your-class">
            @foreach ($products as $product)
                <div class="card">
                    <img src="{{url('storage/' . $product->img )}}" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <div class="col-sm-6"><h6 class="product-price">TK <span>{{$product->price}}</span></h6></div>
                        <div class="d-grid">
                            <a href="{{route('add.to.cart',$product->id)}}" class="btn btn-success">অর্ডার করুন</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.4.1/jquery-migrate.js" integrity="sha512-FruHrHbK/kxrB8bV0sXKTaPazRf3Nz5gFVtdV0INaL+XZ6ehZtcuiGe8ZcJkvOcnPNBcJzZFAnkgdl7PmepNnA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js" integrity="sha512-eP8DK17a+MOcKHXC5Yrqzd8WI5WKh6F1TIk5QZ/8Lbv+8ssblcz7oGC8ZmQ/ZSAPa7ZmsCU4e/hcovqR8jfJqA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('.your-class').slick({
        dots: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows:true,
       });
    });
    $(function() {
        $('.lazy').Lazy();
    });
</script>

@endsection