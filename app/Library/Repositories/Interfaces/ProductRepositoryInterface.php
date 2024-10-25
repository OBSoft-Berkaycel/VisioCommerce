<?php
namespace App\Library\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function getProductById(int $productId): Collection;
    public function getProductsByShoppingListId(int $listId): Collection;
    public function createProduct(Request $request): void;
    public function updateProduct(Request $request): void;
    public function deleteProduct(Product $product): void;
}