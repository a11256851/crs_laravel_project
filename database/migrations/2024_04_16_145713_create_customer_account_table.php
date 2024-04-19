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
        Schema::create('account.customer_account', function (Blueprint $table) {
            $table->string("account")->primary();
            $table->string("password")->nullable($value = false);
            $table->string("name")->nullable($value = false);
            $table->string("phone")->nullable($value = false);
            $table->string("email")->nullable($value = false);
            $table->string("birthday")->nullable($value = false);
            $table->string("gender")->nullable($value = false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_account');
    }
};
