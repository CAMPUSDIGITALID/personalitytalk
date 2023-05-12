<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use Campusdigital\CampusCMS\Models\Program;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Program
Route::get('/program', function(Request $request){
	// Limit
	$limit = $request->query('limit');

	// Data program
    $program = $limit > 0 ? Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=',$request->query('kategori'))->orderBy('program_at','asc')->limit($limit)->get() : Program::join('kategori_program','program.program_kategori','=','kategori_program.id_kp')->where('kategori_program.slug','=',$request->query('kategori'))->orderBy('program_at','asc')->get();

    // Return
    return response()->json([
    	'status' => count($program) > 0 ? 200 : 404,
    	'data' => $program,
    	'message' => count($program) > 0 ? 'OK' : 'Not Found'
    ]);
})->name('api.program.index');




\Campusdigital\CampusCMS\FaturCMS::APIroutes();
