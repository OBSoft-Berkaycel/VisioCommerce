<?php
namespace App\Library\Repositories\Interfaces;

use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ShoppingListRepositoryInterface
{
    public function getAll(): Collection;
    public function getShoppingListById(int $listId): Collection;
    public function getShoppingListsByUserId(int $userId): Collection;
    public function createShoppingList(Request $request): void;
    public function updateShoppingList(Request $request): void;
    public function deleteShoppingList(ShoppingList $shoppingList): void;
}