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

<script type="text/javascript">
    $(function() {
        $('.lazy').Lazy();
    });
</script>

@endsection