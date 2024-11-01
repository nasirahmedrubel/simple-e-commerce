@extends('admin.admin-layouts.main')

@section('content')

			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Courier Shipment</h1>
							</div>
							<div class="col-sm-6 text-right">
                                <button type="button" class="btn btn-primary">Add Shipment</button>
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
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>ID</th>
											<th>Shipment ID</th>											
                                            <th>Shipment Date</th>
                                            <th>Courier Name</th>
                                            <th>Invoice Quantity</th>
											<th>Product Quantity</th>
                                            <th>Invoice Amount</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										
										
									</tbody>
								</table>										
							</div>
							
							
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

@endsection