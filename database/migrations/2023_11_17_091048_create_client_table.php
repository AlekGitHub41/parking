<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string("FCS")->nullable(false);
            $table->enum("gender", ["Мужчина", "Женщина"])->nullable(false);
            $table->string("telephone")->unique()->nullable(false);
            $table->string("address");
            $table->timestamps();
        });
        DB::statement('ALTER TABLE client MODIFY FCS VARCHAR(50) NOT NULL CHECK (LENGTH(FCS) >= 3)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
