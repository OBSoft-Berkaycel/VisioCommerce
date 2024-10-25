<?php
namespace App\Library\Repositories;

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

    public function createShoppingList(Request $request): void
    {
        
    }

    public function updateShoppingList(Request $request): void
    {
        
    }

    public function deleteShoppingList(ShoppingList $shoppingList): void
    {
        
    }
    
}
