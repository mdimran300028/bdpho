<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExamTimeToQuestionPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_papers', function (Blueprint $table) {
            $table->dateTime('exam_start_time')->after('title')->nullable();
            $table->dateTime('exam_end_time')->after('exam_start_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_papers', function (Blueprint $table) {
            //
        });
    }
}
