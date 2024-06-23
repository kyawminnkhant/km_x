<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'journal_entry_id' => $this->journal_entry_id,
            'charts_of_accounts_id' => $this->charts_of_accounts_id,
            "debit" => $this->debit,
            "credit" => $this->credit,
            "type" => $this->charts->account_type
        ];
    }
}
