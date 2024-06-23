<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\InventoryResource;
use App\Interfaces\InventoryRepositoryInterface;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    private InventoryRepositoryInterface $inventoryRepositoryInterface;

    public function __construct(InventoryRepositoryInterface $inventoryRepositoryInterface)
    {
        $this->inventoryRepositoryInterface = $inventoryRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->inventoryRepositoryInterface->index();

        return ApiResponseClass::sendResponse(InventoryResource::collection($data), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
