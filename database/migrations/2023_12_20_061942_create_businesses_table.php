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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('alias', 50)->index();
            $table->string('name', 250);
            $table->string('image_url', 150);
            $table->tinyInteger('is_closed')->default(0);
            $table->string('price', 5)->nullable();
            $table->double('rating', 10, 2)->nullable();
            $table->string('location_address1', 200)->nullable();
            $table->string('location_address2', 200)->nullable();
            $table->string('location_address3', 200)->nullable();
            $table->string('location_city', 100)->nullable();
            $table->string('location_zip_code', 10)->nullable();
            $table->string('location_country', 5)->nullable();
            $table->string('location_state', 5)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('location_latitude', 100)->nullable();
            $table->string('location_longitude', 100)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
