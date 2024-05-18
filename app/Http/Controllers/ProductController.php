<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    private ProductRepositoryInterface $productRepositoryInterface;

    public function __construct(ProductRepositoryInterface $productRepositoryInterface)
    {
        $this->productRepositoryInterface = $productRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productRepositoryInterface->index();

        return ApiResponseClass::sendResponse(ProductResource::collection($data), '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $details = [
            'name' => $request->name,
            'costs' => $request->costs,
            'sales_price' => $request->sales_price,
            'categoryId' => $request->categoryId,
            'remarks' => $request->remarks
        ];
        DB::beginTransaction();
        try {
            $product = $this->productRepositoryInterface->store($details);
            DB::commit();
            return ApiResponseClass::sendResponse('Product create success', '', 200);
        } catch (\Exception $ex) {
            ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = $this->productRepositoryInterface->getById($id);
        return ApiResponseClass::sendResponse(new ProductResource($product), '', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $updateDetails = [
            'name' => $request->name,
            'costs' => $request->costs,
            'sales_price' => $request->sales_price,
            'categoryId' => $request->categoryId,
            'remarks' => $request->remarks
        ];
        DB::beginTransaction();
        try {
            $product = $this->productRepositoryInterface->update($updateDetails);
            DB::commit();
            return ApiResponseClass::sendResponse('Product update success', '', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->productRepositoryInterface->delete($id);
        return ApiResponseClass::sendResponse('Product delete success', '', 204);
    }
}
