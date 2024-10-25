<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    // Route: GET 'listAll'
    public function index()
    {
        // Method to list all shopping lists
    }

    // Route: GET 'listByUserId/{userId}'
    public function getByUserId($userId)
    {
        // Method to get shopping lists by user ID
    }

    // Route: GET 'listBylistId'
    public function getByListId(Request $request)
    {
        // Method to get shopping list by list ID
    }

    // Route: POST 'create'
    public function store(Request $request)
    {
        // Method to create a new shopping list
    }

    // Route: PUT 'update'
    public function update(Request $request)
    {
        // Method to update an existing shopping list
    }

    // Route: DELETE 'delete'
    public function destroy(Request $request)
    {
        // Method to delete a shopping list
    }

    // Route: GET 'getListItems/{shoppingList}'
    public function getListItems($shoppingList)
    {
        // Method to get items of a specific shopping list
    }

    // Route: POST 'addNewItem'
    public function addNewItemToList(Request $request)
    {
        // Method to add a new item to the shopping list
    }

    // Route: DELETE 'removeItemFromList'
    public function removeItemFromList(Request $request)
    {
        // Method to remove an item from the shopping list
    }
}
