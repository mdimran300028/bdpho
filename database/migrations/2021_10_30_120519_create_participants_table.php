<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('school');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('class_id');
            $table->string('email');
            $table->string('mobile');
            $table->string('reg_no');
            $table->string('avatar');
            $table->string('gender');
            $table->string('post_code');
            $table->text('address');
            $table->string('religion')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('participants');
    }
}
