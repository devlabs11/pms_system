<?php

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
});
?>