<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductDeleteRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Library\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function __construct(private readonly ProductRepositoryInterface $productRepository){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json([
                "status" => true,
                "data" => $this->productRepository->getAll()
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on product list index method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on product list process!'
            ],422);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreateRequest $request)
    {
        try {
            $request->only('name','brand','price','image','description');
            $this->productRepository->createProduct($request);
            return response()->json([
                "status" => true,
                "message" => "New product was created successfully!"
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on product list store method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on product create process!'
            ],422);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request)
    {
        try {
            $request->only('productId','name','brand','image','price','description');
            $this->productRepository->updateProduct($request);

            return response()->json([
                "status" => true,
                "message" => "Product was updated successfully!"
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on product list update method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on product update process!'
            ],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductDeleteRequest $request)
    {
        try {
            $request->only('productId');
            $this->productRepository->deleteProduct($request);
            return response()->json([
                "status" => true,
                "message" => "Product record was deleted successfully!"
            ], 200);
        } catch (\Throwable $th) {
            Log::error('There is an error occured on product list destroy method! Error: '.$th->getMessage());
            return response()->json([
                "status" => false,
                "message" => 'There is an error occured on product delete process!'
            ],422);
        }
    }
}
