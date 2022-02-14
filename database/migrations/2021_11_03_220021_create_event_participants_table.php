<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participants', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('round_id');
            $table->integer('division_id');
            $table->integer('category_id');
            $table->integer('participant_id');
            $table->string('reg_no');
            $table->float('mark',10,2)->nullable();
            $table->tinyInteger('status')->default(2);  //1 = selected, 2 = not selected
            $table->integer('merit_position')->nullable();
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
        Schema::dropIfExists('event_participants');
    }
}
