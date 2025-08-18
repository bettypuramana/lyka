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
        Schema::table('setting_tbls', function (Blueprint $table) {
            $table->string('whats_app')->nullable()->after('contact_number_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('setting_tbls', function (Blueprint $table) {
            $table->dropColumn('whats_app');
        });
    }
};
