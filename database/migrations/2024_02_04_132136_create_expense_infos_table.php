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
        Schema::create('expense_infos', function (Blueprint $table) {
            $table->id();
            $table->string('expense_code');
            $table->string('financial_year');
            $table->date('date');
            $table->unsignedBigInteger('expense_head');
            $table->foreign('expense_head')->references('id')->on('expense_heads');
            $table->double('amount');
            $table->longText('note')->nullable();
            $table->string('attachment')->nullable();
            $table->integer('status')->default(1);
            $table->integer('flag')->default(0);
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
        Schema::dropIfExists('expense_infos');
    }
};
