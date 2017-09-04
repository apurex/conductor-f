@if(session()->has('message'))

	<div class="alert alert-success">
		
	<p>	{{ session()->get('message') }}  </p>

	</div>

@endif