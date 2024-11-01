@extends('layouts.main')

@section('content')
<div class="container contant">
    <div class="row">
        <div class="col-md-6 order-sm-1 order-md-1 order-xs-1">
            <form method="post" action="{{url('/orderstore')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name">
                    @error('name')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address"  placeholder="Enter address">
                    @error('address')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone"  placeholder="Enter phone">
                    @error('phone')
                    <span class="text-danger">
                        {{$message}}
                    </span>
                    @enderror
                </div>
                <div class="form-group d-flex gap-2 mt-3">
                    <div class="form-control">
                        <input type="radio" id="inside"  name="Dcharge"
                        {{session('Dcharge') == '70' ? "checked" : ""}}
                        value="70">
                        <label for="inside">Inside Dhaka</label><br>
                    </div>
                    <div class="form-control">
                        <input type="radio" id="outside"  name="Dcharge" 
                        {{session('Dcharge') == '150' ? "checked" : ""}}
                        value="150">
                        <label for="outside">Outside Dhaka</label><br>
                    </div>
                </div>
                    <button type="submit" class="btn btn-success btn-block form-control mt-3" id="button">Submit</button>
            </form>
        </div>
        
        <div class="col-md-6 order-xs-2 order-sm-2 order-md-3">
            <div class="summary">
                <h3>Billing Information</h3>
                <div class="summary-item"><span class="text">Subtotal</span><span class="price sub-total">{{$sub_total}}</span></div>
                <div class="summary-item"><span class="text">Shipping</span><span class="price tbl-delivery">{{session('Dcharge')}}</span></div>
                <div class="summary-item pb-3"><span class="text">Total</span><span class="price grand-total">{{$net_total}}</span></div>
            </div>
        </div>

        <div class="col-md-6 order-xs-3 order-sm-3 order-md-2">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach (session('cart') as $id => $product)
                            <tr rowId="{{ $id }}">
                                <td><img src="{{url('storage/images/'.$product['image'])}}" alt="" width= '50' height='50' class="img img-responsive"></td>
                                <td class="align-middle">{{$product['name']}}</td>
                                <td class="align-middle">
                                    <div class="d-flex ">
                                        <button class="subqnt">-</button>
                                        <input type="text" class="inputqnt" value="{{$product['quantity']}}">
                                        <button class="addqnt">+</button>
                                    </div>
                                </td>
                                <td class="align-middle">{{$product['price']}}</td>
                                <td class="align-middle" id="tbl-subtotal">{{$product['quantity'] * $product['price']}}</td>
                                <td class="align-middle"><a class="btn btn-outline-danger btn-sm delete-product"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        
        
    </div>

    <div class="row">
        <h3 class="text-center mt-3">Related Product</h3>
    </div>
    
</div>

<script>
    $(document).ready(function(){
        
        function quantityupdate(id, quantity,tbl_subtotal){
            
            
            jQuery.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url : "{{ url('/quantityupdate') }}",
                data : {'qnt' : quantity, 'id' : id},
                method: 'post',
                success : function(result){
                    tbl_subtotal.text(result['tbltotal']);
                    $('.sub-total').text(result['subtotal']);
                    $('.grand-total').text(result['nettotal']);
                    $('.child').text(result['totalqnt']);
                }
            });
        }
       
        function addQuantity(addButton){
            var cartRow = $(addButton).closest('tr');
            var tbl_subtotal = $(addButton).closest('tr').find("#tbl-subtotal");
            var id = $(addButton).closest('tr').attr("rowId");
            var $quantity = $('.inputqnt', cartRow);
            var past_quantity = parseInt($quantity.val());
            if($.isNumeric(past_quantity)){
                $quantity.val(past_quantity + 1);
                var present_quantity = parseInt($quantity.val());
                quantityupdate(id,present_quantity,tbl_subtotal);
            }
            
        }

        function subQuantity(subButton) {
            var cartRow = $(subButton).closest('tr');
            var tbl_subtotal = $(subButton).closest('tr').find("#tbl-subtotal");
            var id = $(subButton).closest('tr').attr("rowId");
            var $quantity = $('.inputqnt', cartRow);
            var past_quantity = parseInt($quantity.val());
            if($.isNumeric(past_quantity)){
                if (past_quantity >= 2) {
                    $quantity.val(past_quantity - 1);
                    var present_quantity = parseInt($quantity.val());
                    quantityupdate(id,present_quantity,tbl_subtotal);
                }
            }
        }

        $('.addqnt').click(function() {
            addQuantity(this);
        });

        $('.subqnt').click(function() {
            subQuantity(this);
            
        });


        $(".delete-product").click(function (e) {
            e.preventDefault();
    
            var ele = $(this);
    
                $.ajax({
                    url: '{{ route('delete.cart.product') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function (response) {
                        if(response['subtotal'] === 0)
                        {
                            location.reload();
                        }
                        ele.parents("tr").remove(); 
                        $('.sub-total').text(response['subtotal']);
                        $('.grand-total').text(response['nettotal']);
                        $('.child').text(response['totalqnt']); 
                        
                    }
                });
        });

        $('input[type=radio][name=Dcharge]').on('change', function() {
            var selected = $("input[type='radio'][name='Dcharge']:checked");
            
            $.ajax({
                    url: '{{ url("/dchargeupdate") }}',
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        dcharge: selected.val()
                    },
                    success: function (response) {
                        $('.tbl-delivery').text(selected.val());
                        $('.sub-total').text(response['subtotal']);
                        $('.grand-total').text(response['nettotal']);
                    }
                });
        });

       



        

    });
</script>
@endsection