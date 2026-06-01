<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MyWorkbookController;

Route::get('/myworkbook/create', [MyWorkbookController::class, 'create'])
    ->name('myworkbook.create');

Route::post('/myworkbook/store', [MyWorkbookController::class, 'store'])
    ->name('myworkbook.store');

Route::get('/myworkbook/list', [MyWorkbookController::class, 'index'])
    ->name('myworkbook.list');

Route::get('/myworkbook/export/pdf', [MyWorkbookController::class, 'exportPdf'])
    ->name('myworkbook.export.pdf');
	
Route::get('/myworkbook/edit/{ID}', [MyWorkbookController::class, 'edit'])
    ->name('myworkbook.edit');

Route::put('/myworkbook/update/{ID}', [MyWorkbookController::class, 'update'])
    ->name('myworkbook.update');
	
	
#C:\xampp\htdocs\myWorkbook	