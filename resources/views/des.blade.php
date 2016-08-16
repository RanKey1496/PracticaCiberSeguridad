@extends('template.main')

@section('content')    
    <div class="row">
	  <div class="col-md-4">
	  	<div class="radio">
		  <label>
		    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show1();" checked>
		    Encriptar papu
		  </label>
		</div>
		<div id="Eoption1" class="container" style="display: block;">
			<form method="POST" action="{{ route('encript.despost') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
				    <input type="text" class="form-control" id="stringE" placeholder="Que vas a encriptar socio?">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="saltE" placeholder="Alguna key en especial panita?">
				</div>
				<span class="btn btn-primary encript">Encriptame esta papá</button>
			</form>
		</div>

		<div class="radio">
		  <label>
		    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="show2();">
		    Desencriptar papu
		  </label>
		</div>
		<div id="Eoption2" class="container" style="display: none;" >
			<form>
				<div class="form-group">
				    <input type="text" class="form-control" id="stringD" placeholder="Desencriptar? Quien te conoce?">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="saltD" placeholder="Rotate la key puej">
				</div>
				<span class="btn btn-primary desencript">Desencriptame esta papá</button>
			</form>
		</div>
		<textarea id="result" class="form-control" placeholer="Resultado swagger aquí padrino" disabled="true" style="margin-top: 50px;">Resultado swagger aquí padrino</textarea>
		<p style="margin-top:15px;">Se demoró: <p id="time">Una eternidad :v</p></p>
	  </div>
	  <div class="col-md-8"><img id="satan" src="{{ url('/') }}/resources/des.png"></div>
	</div>

	<h1></h1>
	<p id="besar" class="btn btn-danger btn-lg" href="" onclick="beso();">Satán dame un beso <3</p>

	<script type="text/javascript">
		function show1(){
		  document.getElementById('Eoption1').style.display ='block';
		  document.getElementById('Eoption2').style.display = 'none';
		}
		function show2(){
		  document.getElementById('Eoption1').style.display ='none';
		  document.getElementById('Eoption2').style.display = 'block';
		}

		$('#besar').click(function(){
		   $('#satan').attr('src', '{{ url('/') }}/resources/des2.png');
		});

		$(function(){
			$('.encript').click(function(e){
				var string = $('#stringE').val(); 
				var salt = $('#saltE').val(); 
				$.post('{{ route('encript.despost') }}', {
					"string" : string,
					"salt"	 : salt
				}, function(response) {
					if(response.result != null){
						$('#result').val(response.result);
						$('#time').text(response.time);
						}else{
							alert(response.result);
						}
					}, "json").always(function() {});
				return false;
			});
		});

		$(function(){
			$('.desencript').click(function(e){
				var string = $('#stringD').val(); 
				var salt = $('#saltD').val(); 
				$.post('{{ route('desencript.despost') }}', {
					"string" : string,
					"salt"	 : salt
				}, function(response) {
					if(response.result != null){
						$('#result').val(response.result);
						$('#time').text(response.time);
						}else{
							alert(response.result);
						}
					}, "json").always(function() {});
				return false;
			});
		});
	</script>
@endsection