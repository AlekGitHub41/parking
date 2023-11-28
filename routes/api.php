<?php

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/client-all', function () {
    $clients = DB::table('client')->select('*')->get();
    return response()->json($clients);
});
Route::post('/clients-automobile/{FCS}', function ($FCS) {
    $automobile = DB::table('automobile')
        ->join('client', 'automobile.client_id', '=', 'client.id')
        ->select('automobile.*')
        ->where('client.FCS', '=', $FCS)
        ->where('automobile.is_active', '=', 1)
        ->get();
    return response()->json($automobile);
});
