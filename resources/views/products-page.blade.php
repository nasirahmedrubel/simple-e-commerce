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
            <h5>{{$product->name}}</h5>
            <h3>${{$product->price}}</h3>
            <form action="{{url('/productcart')}}" method="post">
                @csrf
                <input type="hidden" name="productid" value="{{$product->id}}">
                <div class="input-group mb-3" style="width: 130px">
                    <button type="button" id="minus" class="input-group-text">-</button>
                    <input type="text" id="qnt" class="form-control text-center" name="qnt" value="1" onkeypress="return isNumber(event)">
                    <button type="button" id="plus" class="input-group-text">+</button>
                </div>
                
                
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

    <div class="row related">
        <h3 class="atma-regular text-center">এই ধরনের কিছু প্রোডাক্ট</h3>
    </div>

</div>
@if($feature_image === true)
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
@endif
<script type="text/javascript">
    let qnt = document.querySelector('#qnt');
    let plus = document.querySelector('#plus');
    let minus = document.querySelector('#minus');

    plus.onclick = () => {
        qnt.value = parseInt(qnt.value) + 1;
    }
    minus.onclick = () => {
        if(parseInt(qnt.value) > 1){
            qnt.value = parseInt(qnt.value) - 1;
        }
    }
    qnt.onchange = () => {
        if(qnt.value === ""){
            qnt.value = 1;
        }
    }
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
@endsection