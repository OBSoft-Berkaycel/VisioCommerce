<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\ShoppingList\ShoppingListCreateRequest;
use App\Http\Requests\ShoppingList\ShoppingListDeleteRequest;
use App\Http\Requests\ShoppingList\ShoppingListUpdateRequest;
use Illuminate\Database\Eloquent\Collection;

interface ShoppingListRepositoryInterface
{
    public function getAll(): Collection;
    public function getShoppingListById(int $listId): Collection;
    public function getShoppingListsByUserId(int $userId): Collection;
    public function createShoppingList(ShoppingListCreateRequest $request): void;
    public function updateShoppingList(ShoppingListUpdateRequest $request): void;
    public function deleteShoppingList(ShoppingListDeleteRequest $request): void;
}