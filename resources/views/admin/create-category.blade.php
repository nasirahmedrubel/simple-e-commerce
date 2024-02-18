@extends('admin.admin-layouts.main')

@section('content')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Category</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.categories')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<form action="{{url('/admin/categories/create')}}" method="post">
							@csrf
							<div class="card">
								<div class="card-body">								
									<div class="row">
										<div class="col-md-12">
											<div class="mb-3">
												<label for="name">Name</label>
												<input type="text" name="name" id="name" class="form-control" placeholder="Categories">	
											</div>
										</div>									
									</div>
								</div>							
							</div>
							<div class="pb-5 pt-3">
								<button type="submit" class="btn btn-primary">Create</button>
								<a href="{{route('admin.categories')}}" class="btn btn-outline-dark ml-3">Cancel</a>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
@endsection