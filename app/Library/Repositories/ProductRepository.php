<?php
namespace App\Library\Repositories;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductDeleteRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Library\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function createProduct(ProductCreateRequest $request): void
    {
        DB::transaction(function() use ($request){
            Product::create($request->all());
        });
    }

    public function updateProduct(ProductUpdateRequest $request): void
    {
        DB::transaction(function() use($request){
            $product = Product::findOrFail($request->get('productId'));
            $product->update($request->all());
        });
    }

    public function deleteProduct(ProductDeleteRequest $request): void
    {
        DB::transaction(function() use($request){
            $product = Product::findOrFail($request->get('productId'));
            $product->delete();
        });
    }
    
}
