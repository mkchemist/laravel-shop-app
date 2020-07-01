<?php

use Illuminate\Support\Facades\Route;



Route::prefix("/admin")->group(function() {

	Route::get('/', function () {
	    return view('pages.admin.dashboard');
	});

    Route::resource("/category" , "CategoryController");

    Route::resource("/products/", "ProductController");
});
