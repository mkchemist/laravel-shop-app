<?php

use Illuminate\Support\Facades\Route;



Route::prefix("/admin")->group(function() {

	Route::get('/', function () {
	    return view('pages.admin.dashboard');
	});

    Route::resource("/category" , "CategoryController");

    Route::get('/products/trashed',"ProductController@viewTrashed");
    Route::post('/products/restore/{id}',"ProductController@restore");
    Route::resource("/products", "ProductController");
});
