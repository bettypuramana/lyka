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
    public function up(): void
    {
        Schema::create('continents', function (Blueprint $table) {
            $table->char('code', 2)->primary()->comment('Continent code');
            $table->string('name', 255)->nullable();
			$table->char('status', 1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('continents');
    }
};
