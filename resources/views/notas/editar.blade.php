@extends('plantilla')

@section('seccion')

	<h1> Editar nota {{ $nota -> id}} </h1>

	@if (session('mensaje'))
		<div class="alert alert-success"> {{ session('mensaje') }} </div>			
	@endif

	<form action="{{ route('notas.update', $nota -> id) }}" method="POST"> 
		{{-- Con esto indicamos que queremos hacer un update en vez de post, solo que se pone post antes porque html no sabe leer put --}}
		@method('PUT')
		
		{{-- "@csrf" : Esto sirve como protección para que no manden formularios desde otra página web que no sea la nuestra --}}
		{{-- Genera tokens de seguridad para evitar que robots maliciosos colapsen nuetsro citio web --}}
		@csrf

		{{-- En caso de que llegue un error a los inputs de nombre y descripción de ejecuta lo siguente --}}
		@error('nombre')
			<div class="alert alert-danger">
				El nombre es obligatorio.

				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"> &times;  </span>
				</button>
			</div>						
		@enderror

		@error('escripcion')
			<div class="alert alert-danger">
				La descripcion es obligatoria.

				{{-- "x" para cerra el modal --}}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"> &times;  </span>
				</button>
			</div>						
		@enderror			

		<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ $nota -> nombre }}">
		<input type="text" name="escripcion" placeholder="Descripción" class="form-control mb-2" value="{{ $nota -> escripcion }}">
		<button class=" btn btn-warning btn-block" type="submit"> Editar </button>
	</form>
		
@endsection