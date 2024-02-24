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
        Schema::create('income_details', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('fund_type')->nullable();
            $table->string('financial_year');
            $table->integer('bank_id')->nullable();
            $table->unsignedBigInteger('income_head')->nullable();
            $table->foreign('income_head')->references('id')->on('income_heads');
            $table->string('number');
            $table->date('opening_date')->nullable();
            $table->date('maturity_date')->nullable();
            $table->string('duration')->nullable();
            $table->double('interest_rate')->nullable();
            $table->double('amount');
            $table->double('excise_duty')->nullable();
            $table->longText('note')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status')->default(1);
            $table->integer('flag')->default(0)->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_details');
    }
};
