<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('pages.landing-page');
});
Route::get('/login', function () {
    return view('pages.login');
});

Route::post('/login', "HomeController@login");

Route::get('/logout', function () {
	Auth::logout();
	return redirect("/")->with([
		"alert-message"	=>	"Goodbay"
	]);
});

Route::get('/product/{id}', function ($id) {
    $product = \App\Product::find($id);
    $similers = App\Product::where("id" ,"!=", $product->id)
                            ->where("category_id" , $product->category_id)
                            ->get();
	return view("pages.user.product.view")->with([
        "similers" => $similers,
        "product" => $product,
        ]);
});

