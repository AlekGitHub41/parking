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
        Schema::create('automobile', function (Blueprint $table) {
            $table->id();
            $table->string("brand");
            $table->string("model");
            $table->string("color");
            $table->string("number_rf");
            $table->boolean('is_active');
            $table->unsignedBigInteger("client_id")->nullable(false);
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('client')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('automobile');
    }
};
