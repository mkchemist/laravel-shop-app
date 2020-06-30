@extends('layouts.admin')
@section('content')
<div class="bg-white p-2" style="min-height: 600px">
	<div class="alert alert-info">
		<span><i class="fa fa-edit"></i></span>
		<span class="mb-0">Edit category {{ $cat->name }}</span>
	</div>
	<div class="my-2 py-3">
		<div class="my-3 mx-auto col-lg-6">
			<div class="form-group">
				<p class="form-text text-muted small mb-0">
					<b>Category name :</b> 
				</p>
				<input type="text" name="name" placeholder="Enter category name" class="lead font-weight-bold text-primary form-control-plaintext" value={{ $cat->name }}>
			</div>
			<div class="form-group">
				<p class="form-text text-muted small mb-0">
					<b>Category description :</b>
				</p>
				<textarea name="description" id="description" class="lead font-weight-bold text-primary form-control-plaintext" placeholder="Enter category description">{{$cat->description}}</textarea>
			</div>
			<div class="form-group row mx-auto justify-content-end">
				<a href="{{ url("/admin/category/") }}" class="btn btn-dark mx-1 btn-sm my-lg-0 my-1">back</a>
				<a href="{{ url("/admin/category/$cat->id/edit") }}" class="btn btn-warning mx-1 btn-sm my-lg-0 my-1">edit</a>
				<form method="POST" action="{{ url("/admin/category/$cat->id") }}" class="mx-1 my-lg-0 my-1">
					@csrf
					@method("DELETE")
					<button class="btn btn-sm btn-danger" type="submit">
						delete
					</button>
				</form>
			</div>
		</div>
	</div>
	
</div>
@endsection