@extends('plantilla')

@section('seccion')		
			<h1 class="display-4"> Notas </h1>

			{{-- Alerta al agregar la nota --}}
			@if (session('mensaje'))
					<div class="alert alert-success">
						{{ session('mensaje') }}
					</div>
			@endif

			{{-- El método POST sirve para agregar información --}}
			<form action="{{ route('notas.crear') }}" method="POST"> 
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

				<input type="text" name="nombre" placeholder="Nombre" class="form-control mb-2" value="{{ old('nombre') }}">
				<input type="text" name="escripcion" placeholder="Descripción" class="form-control mb-2" value="{{ old('escripcion') }}">
				<button class=" btn btn-primary btn-block" type="submit"> Agregar </button>
			</form>

			{{-- Agregamos la tabla de bootstrap --}}
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#id</th>
						<th scope="col">Nombre</th>
						<th scope="col">Descripción</th>
						<th scope="col">Acciones</th>
					</tr>
				</thead>
				<tbody>

					@foreach ($notas as $item)							
					
					<tr>
						<th scope="row">{{$item -> id}}</th>
						<td>

							<a href= {{ route('notas.detalle', $item) }}>
								{{$item -> nombre}}
							</a>
							
						</td>
						<td>{{$item -> escripcion}}</td>
						<td>
							<a href="{{ route('notas.editar', $item) }}" class="btn btn-warning btn-sm"> Editar </a>

							<form action="{{ route('notas.eliminar', $item) }}" method="POST" class="d-inline">
								@method('DELETE')
								@csrf
								<button class="btn btn-danger btn-sm" type="submit"> Eliminar </button>

							</form>

						</td>
					</tr>		
					
					@endforeach()
					
				</tbody>
			</table>
@endsection
