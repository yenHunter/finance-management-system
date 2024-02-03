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
        Schema::create('fdr_infos', function (Blueprint $table) {
            $table->id();
            $table->string('fund_type');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank_infos');
            $table->string('fdr_no');
            $table->date('opening_date');
            $table->date('maturity_date');
            $table->string('duration');
            $table->double('interest_rate');
            $table->double('amount');
            $table->double('excise_duty')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fdr_infos');
    }
};
