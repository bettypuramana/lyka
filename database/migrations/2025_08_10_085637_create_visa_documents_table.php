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
        Schema::create('visa_documents', function (Blueprint $table) {
            $table->id();
            $table->string('title',500);
            $table->unsignedBigInteger('visa_id');
            $table->foreign('visa_id')->references('id')->on('visas');
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
        Schema::dropIfExists('visa_documents');
    }
};
