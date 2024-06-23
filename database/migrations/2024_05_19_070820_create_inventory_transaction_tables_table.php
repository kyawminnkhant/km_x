<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('productId');
            $table->date('transactionDate');
            $table->integer('qty');
            $table->enum('TransactionType', ['PURCHASE', 'SALE', 'RETURN_SUPPLIER', 'RETURN_CUSTOMER', 'ADJUSTMENT', 'TRANSFER']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_inventory_transaction_tables');
    }
};
