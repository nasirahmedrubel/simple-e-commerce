@extends('admin.admin-layouts.main')

@section('content')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Orders</h1>
								@if (session('delete'))
									<div class="alert alert-primary" role="alert">
										{{ session('delete') }}
									</div>
								@endif
							</div>
							<div class="col-sm-6 text-right">
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
							<div class="card-header d-flex justify-content-between">
								<div class="col-md-4">
									<button type="button" class="btn btn-primary" id="printButton">Print</button>
								</div>
								
								<div class="col-md-8">
									<form action="" method="get">
										<div class="card-tools">
											<div class="input-group input-group" >
												
													<input type="search" name="search" class="form-control float-right" placeholder="Search" value="{{$search}}">
													<div class="input-group-append">
													<button type="submit" class="btn btn-default">
														<i class="fas fa-search"></i>
													</button>
													</div>
											</div>
										</div>
									</form>
								</div>
									
								
								
								
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th><input type="checkbox" class="selectall"></th>
											<th>Inv No.</th>											
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
											<th>Status</th>
                                            <th>Total</th>
                                            <th>Date Purchased</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<form action="{{Route('invoice.print')}}" target="_blank" method="post" id="form">
											@csrf
											@foreach ($invoices as $invoice)
											<tr>
												<td><input name="invid[]" type="checkbox" value="{{$invoice->id}}"></td>
												<td><a href="#" class="invdetails" id="{{$invoice->id}}">{{str_pad($invoice->id,8,"0",STR_PAD_LEFT)}}</a></td>
												<td>{{$invoice->name}}</td>
												<td>{{$invoice->address}}</td>
												<td>{{$invoice->phone}}</td>
												<td><span class="badge bg-success">{{$invoice->status->name}}</span></td>
												<td>{{$invoice->bill}}</td>
												<td>{{Date('d-m-Y', strtotime($invoice->created_at))}}</td>
												<td>
												<a href="{{url('/admin/invoicedetails/')}}/{{$invoice->id}}" target="_blank" rel="noopener noreferrer" class="btn btn-info">View</a>
												<a href="{{url('/admin/invoice/delete/')}}/{{$invoice->id}}" class="btn btn-danger">Delete</a>
												</td>																				
											</tr>
											@endforeach
										</form>
										
									</tbody>
								</table>										
							</div>
							@if ($invoices->count() >= 20)

							<div class="card-footer clearfix">
								{{-- <ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul> --}}
								{{$invoices->links()}}
							</div>
								
							@endif
							
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
				  <div class="modal-content">

					<div class="modal-header">
						<h5>Product List</h5>
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body1">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Qnt</th>
								<th>Total</th>
								
							</tr>
						</thead>
						<tbody class="modal-body">
							
						</tbody>
					</table>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				  </div>
				</div>
			  </div>

	<script>
		let getalink = document.querySelectorAll(".invoiceproductlink");
		let bodyt = document.querySelector("tbody");

		$(document).ready(function(){
			$(".invdetails").click(function(e){
				e.preventDefault();
				// alert($(this).attr('id'));
				ShowModal($(this).attr('id'));
			});
		});

		function ShowModal(id){
			let count = 1;
			let html = "";
			$.ajax({
					url: '{{ url("/getinvoiceproduct") }}',
					method: "POST",
					data: {
					_token: '{{ csrf_token() }}', 
					id: id
				},
				success: function (data) {
					let html;
					let subtotal=0;
				// 	console.log(data['id']);
				// 	console.log(data['id'].status.name);
					// data['product'].forEach((element) => 
					// 	console.log(element.product)
					// );
					// console.log(data['id']);
					console.log(data['product']);
					$.each(data['product'], function(key, val){
						let total = val.quantity * val.price;
						html += '<tr><td>'+count+'</td><td>'+val.product.name+'</td><td>'+val.price+'</td><td>'+val.quantity+'</td><td>'+total+'</td></tr>';
						count++;
						subtotal += total;
					})
					
					html += '<tr><td colspan="4" class="text-end">Subtotal</td><td>'+subtotal+'</td></tr>';
					html += '<tr><td colspan="4" class="text-end">Delivery Charge</td><td>'+data['id'].Dcharge+'</td></tr>';
					html += '<tr><td colspan="4" class="text-end">Net Total</td><td>'+data['id'].bill+'</td></tr>';

					$('.modal-body').html(html);
					$("#exampleModal").modal("show");
				}
			});
		}

		
		$('.selectall').click(function () {    
			$('input:checkbox').prop('checked', this.checked);    
		});
		jQuery("#printButton").click(function(){	
			jQuery("#form").submit();
		});
	</script>
@endsection