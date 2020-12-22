@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<div class="alert alert-danger text-center alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times-circle"></i></button>
			<strong>{{ $error }}</strong>		
		</div>
	@endforeach
@endif

@if(session('success'))
	<div class="alert alert-success text-center alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times-circle"></i></button>
		<strong>{{ session('success') }}</strong>
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger text-center alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times-circle"></i></button>
		<strong>{{ session('error') }}</strong>
	</div>
@endif

@if(session('info'))
<div class="alert alert-info alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fas fa-times-circle"></i></button>
		{{ session('info') }}<br>
		@if(session('alert-link'))
			&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i>&nbsp;<a href="{{ session('alert-link') }}" class="alert-link">{{ session('alert-link-text')}}</a>.
		@endif
</div>
@endif


@if(session('msg'))
	<div class="alert alert-primary fade show text-center alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		{{ session('msg') }}
	</div>
@endif


@if(session('msgn'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  	{{ session('msgn') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif