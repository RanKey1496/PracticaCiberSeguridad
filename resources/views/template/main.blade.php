<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title', 'Welcome') | Practica de Electronica</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('plugins\css\general.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		})
	</script>
</head>
<body>

	<!--Navbar-->
	@include('template.partials.nav')
	<!--End Navbar-->
	<div class="spacer"></div>
	<!--Page-Container-->
	@include('template.partials.errors')
	<div class="jumbotron">
		<section>
			@yield('content')
		</section>
	</div>

	<!--End Page Container-->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					@include('template.partials.foot')
				</div>
			</div>
		</div>
	</div>
</body>
</html>
