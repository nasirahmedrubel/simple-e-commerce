@extends('layouts.main')

@section('content')
<link rel="stylesheet" href="{{asset('css/product_slider.css')}}">
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img id=featured src="{{asset('storage/images/')}}/{{$product->img}}">
            @if($feature_image === true)
            <div id="slide-wrapper" >
                <img id="slideLeft" class="arrow" src="{{asset('img/arrow-left.png')}}">
                <div id="slider">
                    @foreach ($product->feature_images as $img)
                    <img class="thumbnail" src="{{asset('storage/images/')}}/{{$img->url}}">
                    @endforeach
                </div>
                <img id="slideRight" class="arrow" src="{{asset('img/arrow-right.png')}}">
            </div>
            @endif
        </div>

        <div class="col-md-6">
            <h1>{{$product->name}}</h1>
            <hr>
            <h3>${{$product->price}}</h3>
            <form action="{{url('/productcart')}}" method="post">
                @csrf
                <input type="hidden" name="productid" value="{{$product->id}}">
                <input name="qnt" type="number" class="form-control" value="1">
                
                <button type="submit" class="btn btn-success">Buy Now</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Description</h2>
            <div class="description">
                {!!$product->description!!}
            </div>
        </div>
    </div>

</div>

<script type="text/javascript">
    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for (var i=0; i < thumbnails.length; i++){

        thumbnails[i].addEventListener('click', function(){
            console.log(activeImages)
            
            if (activeImages.length > 0){
                activeImages[0].classList.remove('active')
            }
            

            this.classList.add('active')
            document.getElementById('featured').src = this.src
        })
    }


    let buttonRight = document.getElementById('slideRight');
    let buttonLeft = document.getElementById('slideLeft');

    buttonLeft.addEventListener('click', function(){
        document.getElementById('slider').scrollLeft -= 180
    })

    buttonRight.addEventListener('click', function(){
        document.getElementById('slider').scrollLeft += 180
    })


</script>
@endsection