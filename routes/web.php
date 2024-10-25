<?php

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
        Route::put('update', [ShoppingListController::class, 'update'])->name('shoppin-list.update');
        Route::delete('delete', [ShoppingListController::class, 'destroy'])->name('shopping-list.delete');

        ## Shopping List Update Routes
        Route::get('getListItems/{shoppingList}', [ShoppingListController::class, 'getListItems'])->name('shopping-list.getListItems');
        Route::post('addNewItem', [ShoppingListController::class, 'addNewItemToList'])->name('shopping-list.addNewItem');
        Route::delete('removeItemFromList', [ShoppingListController::class, 'removeItemFromList'])->name('shopping-list.removeItemFromList');
    });
    ## Product Routes
});