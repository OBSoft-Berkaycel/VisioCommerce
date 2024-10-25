<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('v1')->group(function(){

    ## Shopping List Routes
    Route::prefix('shopping-list')->group(function(){
        Route::get('listAll',[ShoppingListController::class, 'index'])->name('shopping-list.listAll');
        Route::get('listByUserId',[ShoppingListController::class, 'getByUserId'])->name('shopping-list.getByUserId');
        Route::get('listBylistId', [ShoppingListController::class, 'getByListId'])->name('shopping-list.getByListId');
        Route::post('create', [ShoppingListController::class, 'store'])->name('shopping-list.create');
        Route::put('update', [ShoppingListController::class, 'update'])->name('shopping-list.update');
        Route::delete('delete', [ShoppingListController::class, 'destroy'])->name('shopping-list.delete');

        ## Shopping List Update Routes
        Route::get('getListItems', [ShoppingListController::class, 'getListItems'])->name('shopping-list.getListItems');
        Route::post('addNewItem', [ShoppingListController::class, 'addNewItemToList'])->name('shopping-list.addNewItem');
        Route::delete('removeItemFromList', [ShoppingListController::class, 'removeItemFromList'])->name('shopping-list.removeItemFromList');
    });
    ## Product Routes

    Route::prefix('products')->group(function(){
        Route::get('getAll', [ProductController::class, 'index'])->name('products.index');
        Route::post('create', [ProductController::class, 'store'])->name('products.create');
        Route::put('update', [ProductController::class, 'update'])->name('products.update');
        Route::delete('delete', [ProductController::class, 'destroy'])->name('products.delete');
    });
});