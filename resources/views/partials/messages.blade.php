@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger text-center py-2 my-5">
			<strong>{{ $error }}</strong>		
		</div>
	@endforeach
@endif

@if(session('message'))
    <div class="alert alert-success text-center py-2 my-5">
        {{ session('message') }}
    </div> 
@endif

@if(session('error'))
    <div class="alert alert-danger text-center py-2 my-5">
        {{ session('error') }}
    </div> 
@endif