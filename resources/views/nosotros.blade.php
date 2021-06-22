@extends('plantilla')

@section('seccion')

	<h1> Este es mi equipo de trabajo: </h1>

	<!-- Esto se llama ciclo de control, estamos haciendo un foreach del arreglo y obtenemos un item -->
	@foreach($equipo as $item)
		<a href="{{ route('nosotros', $item) }}" class="h4 text-danger"> {{$item}} </a> <br>
	@endforeach

	@if(!empty($nombre))
		
		@switch($nombre)
			
			@case($nombre == 'Ignacio')

				<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
				<p> {{ $nombre }} Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Similique quisquam rem dolorem neque soluta, facilis omnis magnam
				iste accusamus culpa assumenda labore cumque nam, reprehenderit. </p>

			@break

			@case($nombre == 'Juan')

				<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
				<p> {{ $nombre }} Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Similique quisquam rem dolorem neque soluta, facilis omnis magnam
				iste accusamus culpa assumenda labore cumque nam, reprehenderit. </p>

			@break

			@case($nombre == 'Pedro')

				<h2 class="mt-5"> El nombre es {{ $nombre }}: </h2>
				<p> {{ $nombre }} Lorem ipsum dolor sit amet consectetur adipisicing elit.
				Similique quisquam rem dolorem neque soluta, facilis omnis magnam
				iste accusamus culpa assumenda labore cumque nam, reprehenderit. </p>

			@break

		@endswitch

	@endif

@endsection