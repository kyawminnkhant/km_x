<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Classes\HelperClass;
use App\Http\Resources\PurchaseVoucherResource;
use App\Interfaces\PurchaseRepositoryInterface;
use App\Models\PurchaseVoucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurchaseVoucherController extends Controller
{

    private PurchaseRepositoryInterface $purchaseRepositoryInterface;

    public function __construct(PurchaseRepositoryInterface $purchaseRepositoryInterface)
    {
        $this->purchaseRepositoryInterface = $purchaseRepositoryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->purchaseRepositoryInterface->index();
        return ApiResponseClass::sendResponse(PurchaseVoucherResource::collection($data), '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $id = Auth::id();

        $voucherDetails['voucher'] = [
            'merchantId' => $request->merchantId,
            'userId' => $id,
            'status' => $request->status,
            'transportation_fees' => $request->transportation_fees,
            'total' => HelperClass::getOrderTotalCosts($request->orders)
        ];

        $voucherDetails['orders'] = $request->orders;

        DB::beginTransaction();
        try {
            $voucher = $this->purchaseRepositoryInterface->store($voucherDetails);
            DB::commit();
            return ApiResponseClass::sendResponse('Voucher create success', '', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PurchaseVoucher $purchaseVoucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PurchaseVoucher $purchaseVoucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PurchaseVoucher $purchaseVoucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PurchaseVoucher $purchaseVoucher)
    {
        //
    }
}
