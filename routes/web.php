<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
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
	return view('domains');
	
});
	//->name('index');


Route::post('/', function (Request $request) {

	$domainData = $request->input('domain[name]');


	DB::table('domains')->insertGetId(
	    ['name' => $domainData,
             'updated_at' => '12:12:12',
             'created_at' => '11:11:11']
        );

	return redirect('/')->with('status', 'INSERTED');
       // return view('/', ['domains' => $domains]);
	//return view('/', []);      
});
//})->name('domains.store');
