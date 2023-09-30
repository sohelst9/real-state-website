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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->text('p_title');
            $table->tinyInteger('p_selling_type');
            $table->integer('p_type');
            $table->tinyInteger('p_feature')->nullable();
            $table->string('p_price');
            $table->string('p_area')->nullable();
            $table->string('p_floor')->nullable();
            $table->text('p_address');
            $table->string('p_city');
            $table->string('p_state')->nullable();
            $table->longText('p_map')->nullable();
            $table->integer('p_bedroom')->nullable();
            $table->integer('p_bathroom')->nullable();
            $table->string('p_thumbnail_image')->nullable();
            $table->string('p_legal_document')->nullable();
            $table->longText('p_description')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('management_check')->default(0);
            $table->tinyInteger('admin_check')->default(0);
            $table->tinyInteger('is_avilable')->default(1);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
