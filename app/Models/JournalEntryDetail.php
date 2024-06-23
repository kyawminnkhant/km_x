<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntryDetail extends Model
{
    use HasFactory;

    protected $fillable = ['journal_entry_id', 'charts_of_accounts_id', 'debit', 'credit'];

    public function charts()
    {
        return $this->belongsTo(ChartsOfAccounts::class, 'charts_of_accounts_id');
    }
}
