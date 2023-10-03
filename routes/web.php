<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;



Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();


Route::get('/home',function(){
 return view('admin.common.main');
})->middleware(Authenticate::class);


?>