<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTimeColumnToAnswerScriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_scripts', function (Blueprint $table) {
            $table->dateTime('start_time')->change('start_time')->nullable();
            $table->dateTime('end_time')->change('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_scripts', function (Blueprint $table) {
            $table->dropColumn(['start_time','end_time']);
        });
    }
}
