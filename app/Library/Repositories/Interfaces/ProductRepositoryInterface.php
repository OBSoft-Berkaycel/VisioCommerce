<?php
namespace App\Library\Repositories\Interfaces;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductDeleteRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;
    public function getProductById(int $productId): Collection;
    public function getProductsByShoppingListId(int $listId): Collection;
    public function createProduct(ProductCreateRequest $request): void;
    public function updateProduct(ProductUpdateRequest $request): void;
    public function deleteProduct(ProductDeleteRequest $request): void;
}