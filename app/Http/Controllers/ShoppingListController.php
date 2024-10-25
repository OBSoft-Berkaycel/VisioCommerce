<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\ShoppingListCreateRequest;
use App\Http\Requests\ShoppingList\ShoppingListDeleteRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Library\Repositories\Interfaces\ShoppingListRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShoppingListController extends Controller
{

    public function __construct(private readonly ShoppingListRepositoryInterface $shoppingListRepository){}

    public function index()
    {
        try {
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getAll()
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list index method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list process!'
            ],422);
        }
    }

    public function getByUserId(Request $request)
    {
        try {
            
            $request->validate([
                "userId" => "required|numeric"
            ]);
            $request->only(['userId']);
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getShoppingListsByUserId($request->get('userId'))
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list getByUserId method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list getByUserId process!'
            ],422);
        }
    }

    public function getByListId(Request $request)
    {
        try {
            
            $request->validate([
                "listId" => "required|numeric"
            ]);
            $request->only(['listId']);
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getShoppingListById($request->get('listId'))
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list getByListId method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list getByListId process!'
            ],422);
        }
    }

    public function store(ShoppingListCreateRequest $request)
    {
        try {
            $request->only(['userId','name']);
            $this->shoppingListRepository->createShoppingList($request);
            return response()->json([
                "status" => true,
                "message" => "New shopping list was created successfully!",
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list store method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list create process!'
            ],422);
        }
    }

    public function update(ShoppingListUpdateRequest $request)
    {
        try {
            $request->only(['listId','name']);
            $this->shoppingListRepository->updateShoppingList($request);
            return response()->json([
                "status" => true,
                "message" => "Shopping list was updated successfully!",
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list update method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list update process!'
            ],422);
        }
    }

    public function destroy(ShoppingListDeleteRequest $request)
    {
        try {
            $request->only(['listId']);
            $this->shoppingListRepository->deleteShoppingList($request);
            return response()->json([
                "status" => true,
                "message" => "Shopping list was deleted successfully!",
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is and error occured on shopping list destroy method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is and error occured on shopping list delete process!'
            ],422);
        }
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
