<?php
namespace App\Library\Repositories;

use App\Library\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAll(): Collection
    {
        return Product::all();
    }

    public function getProductById(int $productId): Collection
    {
        return Product::find($productId);
    }

    public function getProductsByShoppingListId(int $listId): Collection
    {
        return ShoppingList::find($listId)->items;
    }

    public function createProduct(Request $request): void
    {
        
    }

    public function updateProduct(Request $request): void
    {
        
    }

    public function deleteProduct(Product $product): void
    {
        
    }
    
}
