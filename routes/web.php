<?php

use App\Http\Controllers\GstController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::group(['middleware' => ['auth', 'web']], function() {

Route::get('/home',function(){
 return view('admin.common.main');
});

//.......................................................tax-master-gst..................................................................//
Route::get('/tax-master-create' , function(){

    return view('admin.tax-master.tax-master-create');
});
Route::post('/tax-master-create', [App\Http\Controllers\GstController::class, 'storeGst'])->name('tax-master-create');

Route::get('/tax-master-show', [App\Http\Controllers\GstController::class, 'showGst'])->name('tax-master-show');

Route::get('/edit-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'editGst'])->name('edit-tax-master');

Route::post('/update-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'updateGst']);


Route::get('/delete-tax-master/{id}' , [App\Http\Controllers\GstController::class, 'destroyGst'])->name('delete-tax-master');

Route::get('/trash-tax-master' , [App\Http\Controllers\GstController::class, 'TrashGst'])->name('trash-tax-master');

Route::get('/trash-tax-master-restore/{id}' , [App\Http\Controllers\GstController::class, 'restoreGst'])->name('trash-tax-master-restore');

Route::get('/trash-tax-master-delete/{id}' , [App\Http\Controllers\GstController::class, 'permanentDeleteGst'])->name('trash-tax-master-delete');


// Menus

Route::resource('Menus','App\Http\Controllers\MenuController');


Route::post('Menus' , 'App\Http\Controllers\MenuController@store')->name('Menus.store');
Route::get('menu-list/{id}', 'App\Http\Controllers\MenuController@menuData');
Route::get('menu-index', 'App\Http\Controllers\MenuController@index');
Route::post('menu-list/upload','App\Http\Controllers\MenuController@upload');
Route::get('menu-order/{id}', 'App\Http\Controllers\MenuController@orderData')->name('menu.orderData');
Route::post('menu-sortable','App\Http\Controllers\MenuController@sortData');

});


Route::controller(GstController::class)->group(function(){
    Route::get('gst', 'index');
    Route::get('gst-export', 'export')->name('gst.export');
    
});
?>