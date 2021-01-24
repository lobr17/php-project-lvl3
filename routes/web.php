<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

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
})->name('/');


Route::post('/', function (Request $request) {
        $input = $request->all();
	$request->validate([
		'domain.name' => 'required|max:255|url'
	]);


	$domainData = $request->input('domain.name');
	$domainHost = parse_url($domainData, PHP_URL_HOST);
	$domainScheme = parse_url($domainData, PHP_URL_SCHEME);
	$domainScheme === "http" ? $schemeId = 1 : $schemeId = 2;


	$checkDublication = DB::table('domains')->where('name',$domainHost)->first();       
	if (!$checkDublication) {
		DB::table('domains')->insertGetId(
		    ['name' => $domainHost,
		     'scheme_id' => $schemeId, 
		     'updated_at' => Carbon::now(),
		     'created_at' => Carbon::now()]
		);

		$idObj =  DB::table('domains')
			->select('id')
			->where('name', '=', $domainHost)
			->get();
		$id = (json_decode($idObj, true)[0]['id']);
		return redirect()->route('domains.show', ['id' => $id]);
	}	      

	return view('/');
})->name('domains.store');


Route::get('/domains', function () {
	$domains = DB::table('domains')
		->select('id', 'name')
		->get();
        return view('domains/domains', ['domains' => $domains]);
})->name('domains.index'); 


Route::get('/domains/{id}', function ($id) {	
        $domain = DB::table('domains')
		->select('id', 'name')
		->where('id', $id)
                ->get();
        return view('domains/show', ['domain' => $domain] );
})->name('domains.show');

