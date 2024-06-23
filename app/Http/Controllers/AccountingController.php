<?php

namespace App\Http\Controllers;

use App\Classes\ApiResponseClass;
use App\Http\Resources\AccountingResource;
use App\Interfaces\AccountingRepositoryInterface;
use Illuminate\Http\Request;


class AccountingController extends Controller
{
    private AccountingRepositoryInterface $accountingRepositoryInterface;

    public function __construct(AccountingRepositoryInterface $accountingRepositoryInterface)
    {
        $this->accountingRepositoryInterface = $accountingRepositoryInterface;
    }
    public function index()
    {
        $data = $this->accountingRepositoryInterface->index();
        return ApiResponseClass::sendResponse($data, '', 200);
    }

    public function getById($id)
    {
        $data = $this->accountingRepositoryInterface->getById($id);
        return ApiResponseClass::sendResponse(AccountingResource::collection($data), '', 200);
    }
}
