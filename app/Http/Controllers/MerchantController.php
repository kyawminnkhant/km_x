<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\MerchantResource;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Merchant::all();
        return ApiResponseClass::sendResponse(MerchantResource::collection($data), '', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        DB::beginTransaction();
        try {
            Merchant::create($request->all());
            DB::commit();
            return ApiResponseClass::sendResponse('Merchant create success.', '', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Merchant $merchant)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $data = $request->name;
        DB::beginTransaction();
        try {
            Merchant::whereId($request->id)->update($data);
            DB::commit();
            return ApiResponseClass::sendResponse('Merchant Update success', '', 200);
        } catch (\Exception $ex) {
            return ApiResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
