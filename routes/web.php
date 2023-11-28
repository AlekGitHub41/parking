<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [App\Http\Controllers\ClientAndAutomobile::class, 'show_main_form'])->name('index');

Auth::routes();

Route::get('/create-client', [App\Http\Controllers\CreateClient::class, 'show_form_client'])->name('client.create');
Route::post('/store-client', [App\Http\Controllers\CreateClient::class, 'create_client'])->name('client.store');

Route::get('/create-automobile', [App\Http\Controllers\CreateAutomobile::class, 'show_form_automobile'])->name('automobile.create');
Route::post('/store-automobile', [App\Http\Controllers\CreateAutomobile::class, 'create_automobile'])->name('automobile.store');

Route::match(array('GET', 'POST'), '/client-edit/{client_id}', [App\Http\Controllers\ClientAndAutomobile::class, 'edit_client_get'])->name('client.edit');
Route::match(array('GET', 'POST'), '/automobile-edit/{automobile_id}', [App\Http\Controllers\ClientAndAutomobile::class, 'edit_automobile_get'])->name('automobile.edit');


Route::get("/client-delete/{client_id}",function ($client_id){

    DB::table("client")->where("id","=",$client_id)->delete();
    if (session('previous_url')){
        $get_url = session('previous_url');
        session()->forget('previous_url');
        return redirect($get_url);
    }
    return back();
})->name('client.destroy');

Route::get("/automobile-note-delete/{automobile_id}",function ($automobile_id){
    DB::table("automobile")->where("id","=",$automobile_id)->delete();
    if (session('previous_url')) {
        $get_url = session('previous_url');
        session()->forget('previous_url');
        return redirect($get_url);
    }
    return back();
})->name('automobile-note.destroy');

Route::get('/client-all', [App\Http\Controllers\AllClient::class, 'show_main_form'])->name('all-client.index');
Route::get('/client-automobile/{client}', [App\Http\Controllers\AllClient::class, 'clients_automobile'])->name('clients-automobile.index');

Route::get('/automobile-all', [App\Http\Controllers\AllAutomobile::class, 'show_main_form'])->name('all-automobile.index');


Auth::routes();
