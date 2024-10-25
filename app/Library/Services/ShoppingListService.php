<?php
namespace App\Library\Services;

use App\Http\Requests\ShoppingList\CreateNewListItemRequest;
use App\Http\Requests\ShoppingList\RemoveListItemRequest;
use App\Library\Enums\FavoriteStatus;
use App\Library\Enums\PurchaseStatus;
use App\Library\Repositories\Interfaces\ShoppingListRepositoryInterface;
use App\Library\Services\Interfaces\ShoppingListServiceInterface;
use App\Models\Item;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ShoppingListService implements ShoppingListServiceInterface
{
    public function __construct(private readonly ShoppingListRepositoryInterface $shoppingListRepository){}

    public function getListItems(int $listId): Collection
    {
        return $this->shoppingListRepository->getShoppingListById($listId)->items;
    }

    public function addNewItemToList(CreateNewListItemRequest $request): void
    {
        DB::transaction(function() use($request){
            Item::create([
                'shopping_list_id' => $request->get('listId'), 
                'product_id' => $request->get('productId'), 
                'is_purchased' => PurchaseStatus::FALSE, 
                'is_favorite' => FavoriteStatus::FALSE
            ]);
        });
    }

    public function removeListItem(RemoveListItemRequest $request): void
    {
        DB::transaction(function() use ($request){
            $listItem = Item::where('shopping_list_id', $request->get('listId'))->where('product_id',$request->get('productId'))->first();
            $listItem->delete();
        });
    }
}
