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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('type'); // 1 => cash in , 2 => cash out , 3 => deposit
            $table->integer('amount');   
            $table->timestamps(); 
            $table->integer('status')->default(2); // 0 => rejected , 1 => accept , 2 => waiting
            $table->integer('balance_after'); 
            $table->integer('balance_before');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
            $table->bigInteger('bank_id')->unsigned();
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
