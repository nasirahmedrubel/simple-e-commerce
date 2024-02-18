@extends('admin.admin-layouts.main')

@section('content')
			<!-- Content Wrapper. Contains page content -->
            <script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
            <style type="text/css">
                .ck-editor__editable_inline{
                    height: 350px;
                }
            </style>

			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create Product</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{route('admin.products')}}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
                        <form action="{{url('/admin/products/create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">								
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="title">Product Name</label>
                                                    <input type="text" name="name" id="title" class="form-control" placeholder="Product Name">	
                                                    @error('name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="mb-3 ">
                                                    <label for="description">Product Description</label>
                                                    <textarea name="description" id="description"  placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label for="description">Product Images</label>
                                                    <input type="file" name="images" class="form-control" id="img" accept=".jpeg,.jpg,.png,.bmp">
                                                    @error('images')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3 form-group">
                                                    <label>Feature Images</label>
                                                    <input type="file" name="featureimage[]" class="form-control" accept=".jpeg,.jpg,.png,.bmp" multiple>
                                                    @error('featureimage.*')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>                                        
                                        </div>
                                    </div>	                                                                      
                                </div>
                                
                                
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">	
                                        <div class="mb-3">
                                            <label for="category">Product Categories</label>
                                            <select name="category" id="category" class="form-control">
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                    <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <label for="category">Product Status</label>
                                        <div class="mb-3">
                                            <select name="status" id="status" class="form-control">
                                                @foreach ($status as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <label for="category">Product Price</label>
                                        <div class="mb-3">
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price">	
                                            @error('price')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> 
                                                                
                            </div>
                        </div>
						
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Submit</button>
							<a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                    </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->

        <script>
            ClassicEditor
                .create( document.querySelector( '#description' ),{
                    ckfinder:
                    {
                        uploadUrl: "{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
                    }
                })
                .catch( error => {
                    console.error( error );
		    });
        </script>
        
@endsection