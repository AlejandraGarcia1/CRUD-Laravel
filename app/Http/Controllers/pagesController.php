<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;


class PagesController extends Controller
{
    public function inicio(){
			$notas = Nota::all();
			return view('welcome', compact('notas'));
		}

		public function detalle($id){
			// Aquí valida si existe el elemento, si no redirige a la page 404.
			$nota = Nota::findOrFail($id);

			return view('notas.detalle', compact('nota'));
		}

		// Con el Request podemos capturar toda la información que estamos mandado en el formulario
		public function crear(Request $request){
			// Validamos que los inputs del form tenga contenido para enviar
			$request -> validate([
				'nombre' => 'required',
				'escripcion' => 'required'
			]);
			
			// Muestra lo que introduce el usuario en los inputs
			// return $request -> all();
			$notaNueva = new Nota;
			$notaNueva -> nombre = $request -> nombre;
			$notaNueva -> escripcion = $request -> escripcion;

			// Aquí lo guardamos en nuestra base de datos
			$notaNueva -> save();

			// Redirigimos al usuario a la pagina anterior (a la pag principal) 
			// return back();
			// Aquí edirigimos al usuario a la página anterior pero con un alert con mesaje
			return back() -> with('mensaje', 'Nota agregada!');
		}

		public function editar($id){
			$nota = Nota::findOrFail($id);

			return view('notas.editar', compact('nota'));
		}

		public function update(Request $request, $id){
			$notaUpdate = Nota::findOrFail($id);

			$notaUpdate -> nombre = $request -> nombre;
			$notaUpdate -> escripcion = $request -> escripcion;

			$notaUpdate -> save();

			return back() -> with('mensaje', 'Nota actualizada!');
		}

		public function eliminar($id){

			$notaEliminar = Nota::findOrFail($id);
			$notaEliminar -> delete();

			return back() -> with('mensaje', 'Nota eliminada!');			
		}

		public function fotos(){
			return view('fotos');
		}

		public function noticias(){
			return view('blog');
		}

		public function nosotros($nombre = null){
			$equipo = ['Ignacio', 'Juan', 'Pedro'];

			// return view('nosotros', ['equipo' => $equipo, 'nombre' => $nombre]);
			return view('nosotros', compact('equipo', 'nombre'));
		}
}
