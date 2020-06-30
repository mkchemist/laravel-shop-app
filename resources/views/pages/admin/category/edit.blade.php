@extends('layouts.admin')
@section('content')
<div class="bg-white p-2" style="min-height: 600px">
	<div class="alert alert-warning">
		<span><i class="fa fa-edit"></i></span>
		<span class="mb-0">Edit category {{ $cat->name }}</span>
	</div>
	<div class="my-2 py-3">
		<form action="{{ url('/admin/category/'.$cat->id) }}" method="POST" class="my-3 mx-auto col-lg-6">
			@csrf
			@method("PUT")
			<div class="form-group">
				<p class="form-text text-muted small mb-0">
					<b>Category name</b> : is the name of the group of products
				</p>
				<input type="text" name="name" placeholder="Enter category name" class="form-control {{ $errors->has('name') ? 'border border-danger':'' }}" value={{ $cat->name }}>
				@error('name')
					<span class="text-danger small">Must enter category name</span>
				@enderror
			</div>
			<div class="form-group">
				<p class="form-text text-muted small mb-0">
					<b>Category description</b> : <b><i>( optional )</i></b>  write a few lines to describe this category
				</p>
				<textarea name="description" id="description" class="form-control" placeholder="Enter category description">{{$cat->description}}</textarea>
			</div>
			<div class="form-group clearfix">
				<button type="submit" class="btn btn-success float-right">
					<span><i class="fa fa-save"></i></span>
					<span class="ml-1">Save</span>
				</button>
			</div>
		</form>
	</div>
	
</div>
@endsection