@extends('template.main')

@section('content')
	<div class="row">
	  <div class="col-md-8">
	  	<div class="radio">
		  <label>
		    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="show1();" checked>
		    Encriptar vebé
		  </label>
		</div>
		<div id="Eoption1" class="container" style="display: block;">
			<form method="POST" action="{{ route('encript.aespost') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
				    <input type="text" class="form-control" id="stringE" placeholder="Que vas a encriptar vebé?">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="saltE" placeholder="Alguna key en especial cariño?">
				</div>
				<button type="submit">izi</button>
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
				    <input type="text" class="form-control" id="stringD" placeholder="Desencriptar? Cuantas copas tenés?">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="saltD" placeholder="Rotate la key cosita">
				</div>
				<span class="btn btn-primary desencript">Desencriptame esta papá</button>
			</form>
		</div>
		<textarea id="result" class="form-control" placeholer="Resultado swagger aquí padrino" disabled="true" style="margin-top: 50px;">Resultado swagger aquí padrino</textarea>
		<p style="margin-top:15px;">Se demoró: <p id="time">Una eternidad :v</p></p>
	  </div>
	  <div class="col-md-4"><img id="gil" src="{{ url('/') }}/resources/aes.png"></div>
	</div>

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
				$.post('{{ route('encript.aespost') }}', {
					"string" : string,
					"salt"	 : salt
				}, function(response) {
					if(response.result != null){
						$('#result').val(response.result);
						$('#time').text(response.time);
						$('#gil').attr('src', '{{ url('/') }}/resources/aes2.png');
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
				$.post('{{ route('desencript.aespost') }}', {
					"string" : string,
					"salt"	 : salt
				}, function(response) {
					if(response.result != null){
						$('#result').val(response.result);
						$('#time').text(response.time);
						$('#gil').attr('src', '{{ url('/') }}/resources/aes2.png');
						}else{
							alert(response.result);
						}
					}, "json").always(function() {});
				return false;
			});
		});
	</script>
@endsection