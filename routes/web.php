<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
	return view('welcome');
})->name('domains.index');


Route::post('/', function (Request $request) {
	$domainData = $request->input('domain.name');	
	DB::table('domains')->insertGetId(
	    ['name' => $domainData,
	     'updated_at' => date("Y:m:d, g:i"),
	     'created_at' => date("Y:m:d, g:i")]
	);
        return view('welcome');      
})->name('domains.create');


Route::get('/domains', function () {
	$domains = DB::table('domains')
		->select('id', 'name')
		->get();
        return view('domains/domains', ['domains' => $domains]);
})->name('domains.store'); 


Route::get('/domains/{id}', function ($id) {	
        $domain = DB::table('domains')
		->select('id', 'name')
		->where('id', $id)
                ->get();
        return view('domains/show', ['domain' => $domain] );
})->name('domains.show');

