@extends('layouts.admin')
@section('title','Post An Add')
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style>
	body{
		overflow: visible !important;
	}
	section{
		overflow: auto;
	}

</style>
@endsection
@section('content')
<div class="col-lg-12" >
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
	<div class="row">
		<h1 class="main-header text-center">Request your Demands</h1>
	</div>

	<form action="{{URL::to('/')}}/post_request_goods" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }} 
		<div class="row" style="">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<label for="">Product Category</label>
							<select name="product_category" class="form-control" id="product_category">
								@if(Request::old('product_category') != NULL)
								<option value="{{Request::old('product_category')}}">{{$category->where('id', intval(Request::old('product_category')))->first()->name}}</option>
								@endif
							</select> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<label for="">Product Name</label>
							<input type="text" class="form-control" required="" name="name" placeholder="Product name" value="{{Input::old('name')}}"> 
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<label for="">Product Description</label>
							<textarea id="product_description" name="product_description" rows="4" class="form-control" style="resize: none;" value="{{Input::old('product_description')}}"> </textarea>
						</div>
					</div>
				</div> 
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-9">
						<div class="form-group has-feedback">
							<label for="">Quantity</label>
							<input type="number" class="form-control" name="product_quantity" id="product_quantity" required=""> 
						</div>
					</div>
					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
						<div class="form-group has-feedback"> 
							<label for="">Unit</label>
							<select name="product_unit" class="form-control" style="padding: 0px" id="product_unit">
								@foreach($units as $unit) 	
								<option value="{{$unit->id}}">{{$unit->name}}</option>
								@endforeach
							</select>
						</div>
					</div>				
				</div>			


				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<label for="">Add valid until</label>
							<input type="text" class="form-control" name="expiry_date" id="expiry_date" placeholder="date" required=""> 
						</div>
					</div> 				
				</div>
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<label for="">Add Image</label>
							<input type="file" name="image_file" id="image_file" value="{{Input::old('image_file')}}"> 
						</div>
					</div> 				
				</div>
				<div class="row" style="margin-top:20px;margin-bottom: 100px">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						<div class="form-group has-feedback">
							<input type="submit" class="btn btn-success">
						</div>
					</div> 				
				</div>
				{!! Form::close() !!} 
			</div>
		</div>
	</div>
	@endsection
	@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

	<script type="text/javascript"> 
		$(document).ready(function(){
			$('#expiry_date').datepicker({
				dateFormat: 'yy-mm-dd',
				minDate:'yesterday'
			});
			$("#product_category").select2({
				placeholder:"Select a Category",
				ajax: {
					url: "{{URL::to('/')}}/getallcategories",
					dataType: 'json',
					type: "POST",
					delay: 250,
					data: function (params) {
						return {
							term: params.term,  
						};
					},
					processResults: function (data, params) { 
						params.page = params.page || 1;
						return {
							results: data,
							pagination: {
								more: (params.page * 30) < data.total_count
							}
						};
					},
					cache: true
				}
			});
		});
//end of document ready	
</script>
@endsection