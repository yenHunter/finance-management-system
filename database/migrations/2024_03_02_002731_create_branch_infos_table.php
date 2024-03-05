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
        Schema::create('branch_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('bank_id');
            $table->string('branch_code')->nullable();
            $table->string('branch_name');
            $table->longText('address')->nullable();
            $table->string('swift_code')->nullable();
            $table->integer('status')->default(1)->nullable();
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
        Schema::dropIfExists('branch_infos');
    }
};
