<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingList\CreateNewListItemRequest;
use App\Http\Requests\ShoppingList\RemoveListItemRequest;
use App\Http\Requests\ShoppingList\ShoppingListCreateRequest;
use App\Http\Requests\ShoppingList\ShoppingListDeleteRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Library\Repositories\Interfaces\ShoppingListRepositoryInterface;
use App\Library\Services\Interfaces\ShoppingListServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShoppingListController extends Controller
{

    public function __construct(private readonly ShoppingListRepositoryInterface $shoppingListRepository, private readonly ShoppingListServiceInterface $shoppingListService){}

    public function index()
    {
        try {
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getAll()
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list index method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list process!'
            ],422);
        }
    }

    public function getByUserId(Request $request)
    {
        try {
            
            $request->validate([
                "userId" => "required|numeric|exists:users,id"
            ]);
            $request->only(['userId']);
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getShoppingListsByUserId($request->get('userId'))
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list getByUserId method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list getByUserId process!'
            ],422);
        }
    }

    public function getByListId(Request $request)
    {
        try {
            
            $request->validate([
                "listId" => "required|numeric|exists:shopping_lists,id"
            ]);
            $request->only(['listId']);
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListRepository->getShoppingListById($request->get('listId'))
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list getByListId method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list getByListId process!'
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
            Log::error('There is an error occured on shopping list store method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list create process!'
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
            Log::error('There is an error occured on shopping list update method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list update process!'
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
            Log::error('There is an error occured on shopping list destroy method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list delete process!'
            ],422);
        }
    }

    public function getListItems(Request $request)
    {
        try {
            $request->validate([
                "listId" => "required|numeric|exists:shopping_lists,id"
            ]);
            $request->only(['listId']);
            return response()->json([
                "status" => true,
                "data" => $this->shoppingListService->getListItems($request->get('listId'))
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list getByUserId method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list getByUserId process!'
            ],422);
        }
    }

    public function addNewItemToList(CreateNewListItemRequest $request)
    {
        try {
            $request->only(['listId','productId']);
            $this->shoppingListService->addNewItemToList($request);
            return response()->json([
                "status" => true,
                "message" => "New item was successfully added to shopping list!",
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list addNewItemToList method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on shopping list addNewItemToList process!'
            ],422);
        }
    }

    public function removeItemFromList(RemoveListItemRequest $request)
    {
        try {
            $request->only(['listId','productId']);
            $this->shoppingListService->removeListItem($request);
            return response()->json([
                "status" => true,
                "message" => "Item was successfully removed from the shopping list!",
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on shopping list removeItemFromList method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on removing item from the shopping list process!'
            ],422);
        }
    }
}
