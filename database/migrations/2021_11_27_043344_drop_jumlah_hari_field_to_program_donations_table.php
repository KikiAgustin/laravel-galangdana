<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropJumlahHariFieldToProgramDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('program_donations', function (Blueprint $table) {
            $table->dropColumn('jumlah_hari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('program_donations', function (Blueprint $table) {
            $table->integer('jumlah_hari');
        });
    }
}
