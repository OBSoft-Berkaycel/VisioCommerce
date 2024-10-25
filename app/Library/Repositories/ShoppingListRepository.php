<?php
namespace App\Library\Repositories;

use App\Http\Requests\ShoppingList\ShoppingListCreateRequest;
use App\Http\Requests\ShoppingList\ShoppingListDeleteRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use App\Library\Repositories\Interfaces\ShoppingListRepositoryInterface;
use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingListRepository implements ShoppingListRepositoryInterface
{

    public function getAll(): Collection
    {
        return ShoppingList::all();
    }

    public function getShoppingListById(int $listId): Collection
    {
        return ShoppingList::find($listId);
    }

    public function getShoppingListsByUserId(int $userId): Collection
    {
        return ShoppingList::where('user_id',$userId)->get();
    }

    public function createShoppingList(ShoppingListCreateRequest $request): void
    {
        DB::transaction(function() use ($request){
            ShoppingList::create([
                "user_id" => $request->get('userId'),
                "name" => $request->get('name')
            ]);
        });
    }

    public function updateShoppingList(ShoppingListUpdateRequest $request): void
    {
        DB::transaction(function() use ($request){
            $shoppingList = ShoppingList::find($request->get('listId'));
            $shoppingList->name = $request->get('name');
            $shoppingList->save();
        });
    }

    public function deleteShoppingList(ShoppingListDeleteRequest $request): void
    {
        DB::transaction(function() use ($request){
            ShoppingList::find($request->get('listId'))->delete();
        });
    }
    
}
