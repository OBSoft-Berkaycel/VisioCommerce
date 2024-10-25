<?php
namespace App\Library\Services\Interfaces;

use App\Http\Requests\ShoppingList\CreateNewListItemRequest;
use App\Http\Requests\ShoppingList\RemoveListItemRequest;
use Illuminate\Database\Eloquent\Collection;

interface ShoppingListServiceInterface
{
    public function getListItems(int $listId): Collection;
    public function addNewItemToList(CreateNewListItemRequest $request): void;
    public function removeListItem(RemoveListItemRequest $request): void;
}