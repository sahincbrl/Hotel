<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title_image');
            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->text('description_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->text('pricing_description_az');
            $table->text('pricing_description_en');
            $table->text('pricing_description_ru');
            $table->double('nightly_price');
            $table->double('monthly_price');
            $table->double('weekly_price');
            $table->double('weekend_price');
            $table->double('additional_price');
            $table->double('security_deposit_price');
            $table->integer('last_image')->default(0);
            $table->integer('bed_count');
            $table->integer('bath_count');
            $table->integer('wifi')->default(0);
            $table->integer('tv')->default(0);
            $table->integer('ac')->default(0);
            $table->integer('laundry')->default(0);
            $table->integer('dinner')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
