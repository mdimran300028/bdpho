<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_participants', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id');
            $table->integer('division_id');
            $table->integer('category_id');
            $table->integer('selected_round_id');
            $table->integer('next_round_id')->nullable();
            $table->integer('participant_id');
            $table->integer('obtain_mark');
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
        Schema::dropIfExists('selected_participants');
    }
}
