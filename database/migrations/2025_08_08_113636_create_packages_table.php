<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_title',1000);
            $table->decimal('price', 8, 2);
            $table->integer('group_size');
            $table->integer('continent');
            $table->unsignedBigInteger('country');
            $table->foreign('country')->references('id')->on('countries');
            $table->unsignedBigInteger('tour_type');
            $table->foreign('tour_type')->references('id')->on('tour_types');
            $table->integer('duration');
            $table->string('main_image');
            $table->longText('about');
            $table->integer('status')->default(1)->comment('0-inactive,1-active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
