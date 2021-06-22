<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', PagesController@inicio');
Route::get('/', [App\Http\Controllers\PagesController::class, 'inicio']) -> name('inicio');


// Con "{numero}" indicamos que en ese lugar debe de existir un parámetro del cual el usuario puede acceder.
// Por ejemplo si el usuario quiere ver la fotografía num. 5

# Sin embargo, al definirlo así, estamos diciendo que el parámetro de número es obligatorio, si solo poners "/fotos" se rompe.

// Route::get('fotos/{numero}', function ($numero) {
// 	return 'Estas en la galería de fotos: ' .$numero;
// });



// Definimos que el parámetro de {numero} no sea obligatorio para que no se rompa al solo poner "/fotos"

# Tambien en vez de poner 'sin número' se pued eponer = null

// Route::get('fotos/{numero?}', function ($numero = 'sin número') {
// 	return 'Estas en la galería de fotos: ' .$numero;
// });



#
// Indicamos que el parámetro solo pueda ser un number y no permitir strings
// Con el "where le estamos diciendo lo siguiente:
// Que el parámetro (en este caso {numero}) van a ser definido por la expresión regular que le estamos pasando,
// En este caso la expresión regular [0-9]+ indica que se permiten números de 0-9 infinitas veces, y no acepta letras.

// Route::get('fotos/{numero?}', function ($numero = 'sin número') {
// 	return 'Estas en la galería de fotos: ' .$numero;
// }) -> where('numero', '[0-9]+');




// Crear otra ruta pero de forma más simple con un atajo
// La función "view" tiene 2 parametros (1.Pathname (En este caso 'galeria') y 2.El nombre del archivo que contendrá esa vista)

// Route::view('galeria', 'fotos');




// Ruta de la forma más simple pero con parámetos ( en este caso nuestro parámetro se llama número y nos tiene que retornar el 125)
# Para qu esto se pueda ver en el archivo de fotos.blade.php que esta en view, se le debe pasar el parámetro en esa línea (linea 15)
// Route::view('galeria', 'fotos', ['numero' => 125]);


Route::get('fotos', [App\Http\Controllers\PagesController::class, 'fotos']) -> name('foto');

Route::get('blog', [App\Http\Controllers\PagesController::class, 'noticias'])-> name('noticia');

Route::get('nosotros/{nombre?}', [App\Http\Controllers\PagesController::class, 'nosotros']) -> name('nosotros');

Route::get('/{id}', [App\Http\Controllers\PagesController::class, 'detalle']) -> name('notas.detalle');

Route::post('/', [App\Http\Controllers\PagesController::class, 'crear']) -> name('notas.crear');

Route::get('/editar/{id}', [App\Http\Controllers\PagesController::class, 'editar']) -> name('notas.editar');

Route::put('/editar/{id}', [App\Http\Controllers\PagesController::class, 'update']) -> name('notas.update');

Route::delete('/eliminar/{id}', [App\Http\Controllers\PagesController::class, 'eliminar']) -> name('notas.eliminar');

