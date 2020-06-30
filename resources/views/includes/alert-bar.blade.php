@if(session()->has('alert-message'))
<div class="alert-bar alert-info">
	<span class="float-right alert-bar-close">&times;</span>
	<div class="row mx-auto">
		<div class="col-4 px-0 border-right border-info d-flex align-items-center justify-content-center">
			<span><i class="fa fa-exclamation-triangle fa-3x"></i></span>
		</div>
		<div class="col-8">
			{{ session()->get('alert-message') }}
		</div>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function () {
		$('.alert-bar-close').click(function() {
			$(this).parent().css('margin-right', '-100%');
		});
	});
</script>
@endif