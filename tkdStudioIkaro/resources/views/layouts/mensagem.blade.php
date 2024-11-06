<br>
<div class="row">
	<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
		@if (Session::has('success'))
		<div class="alert alert-success" role="alert">
			{{ Session::get('success') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		@elseif(Session::has('warning'))
		<div class="alert alert-danger" role="alert">
			{{ Session::get('warning') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		@endif
	</div>
</div>
<br>
