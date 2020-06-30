@extends('layouts.admin')
@section('content')
<div class="bg-white p-2" style="min-height: 600px">
	<div class="alert alert-info">
		<p class="mb-0">Categories view</p>
	</div>
	<div class="clearfix">
		<a href="{{ url('/admin/category/create') }}" class="btn btn-success float-right">
			<span><i class="fa fa-plus"></i></span>
			<span class="ml-1">Add new Category</span>
		</a> 
	</div>
	@if(count($cats))
		<div class="p-2">
			<table class="table table-responsive-sm">
				<thead>
					<tr>
						<th>Category name</th>
						<th>Category description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cats as $cat)
						<tr>
							<td>{{ $cat->name }}</td>
							<td>{{ $cat->description }}</td>
							<td class="row mx-auto">
								<a href="{{ url("/admin/category/$cat->id") }}" class="btn btn-info mx-1 btn-sm my-lg-0 my-1">view</a>
								<a href="{{ url("/admin/category/$cat->id/edit") }}" class="btn btn-warning mx-1 btn-sm my-lg-0 my-1">edit</a>
								<form method="POST" action="{{ url("/admin/category/$cat->id") }}">
									@csrf
									@method("DELETE")
									<button class="btn btn-sm btn-danger" type="submit">
										delete
									</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@else
		<p class="text-center display-4">No Categories added</p>
	@endif
</div>
@endsection