<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProgramDonationsIdFieldToCategoryDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category_donations', function (Blueprint $table) {
            $table->dropColumn('program_donations_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('category_donations', function (Blueprint $table) {
            $table->integer('program_donations_id');
        });
    }
}
