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
        Schema::table('visas', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('visas', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('flag');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('packages', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
        Schema::table('packages', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('flag');
        });
    }
};
