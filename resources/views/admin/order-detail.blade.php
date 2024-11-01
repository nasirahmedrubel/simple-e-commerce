@extends('admin.admin-layouts.main')

@section('content')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Order: #4F3S8J</h1>
							</div>
							<div class="col-sm-6 text-right">
                                <a href="orders.html" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header pt-3">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                            <h1 class="h5 mb-3">Shipping Address</h1>
                                            <address>
                                                <strong>Name:</strong> {{$id->name}}<br>
												<strong>Phone:</strong> {{$id->phone}}<br>
												<strong>Address:</strong> {{$id->address}}<br>
                                            </address>
                                            </div>
                                            
                                            
                                            
                                            <div class="col-sm-4 invoice-col">
												<b>Data:</b> {{Date('d-m-Y', strtotime($id->created_at))}}</b><br>
                                                <b>Invoice:</b> {{$id->id}}<br>
                                                <b>Total:</b> {{$id->bill}}tk<br>
                                                <b>Status:</b> <span class="text-success">{{$id->status->name}}</b></span>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-3">								
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Qty</th>                                        
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
													$subtotal = 0;
												@endphp
												@foreach ($id->invoicedetails as $product)
													<tr>
														<td>{{$product->product->name}}</td>
														<td>{{$product->price}}</td>                                        
														<td>{{$product->quantity}}</td>
														<td>{{$product->price * $product->quantity}}</td>
														{{$subtotal +=$product->price * $product->quantity}}
													</tr>
												@endforeach
												<tr>
													<td colspan="3" class="text-end">Subtotal</td>
													<td>{{$subtotal}}</td>
												</tr>
                                                <tr>
													<td colspan="3" class="text-end">Delivery Charge</td>
													<td>{{$id->Dcharge}}</td>
												</tr>
												<tr>
													<td colspan="3" class="text-end">Net Total</td>
													<td>{{$id->bill}}</td>
												</tr>
                                            </tbody>
                                        </table>								
                                    </div>                            
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Order Status</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Pending</option>
                                                <option value="">Shipped</option>
                                                <option value="">Delivered</option>
                                                <option value="">Cancelled</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4 mb-3">Send Inovice Email</h2>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Customer</option>                                                
                                                <option value="">Admin</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
@endsection