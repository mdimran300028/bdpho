<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLoginInfoToParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->tinyInteger('login_status')->after('reg_no')->nullable();
            $table->string('last_login_ip')->after('login_status')->nullable();
            $table->string('browser_name')->after('last_login_ip')->nullable();
            $table->string('security_key')->after('browser_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            $table->dropColumn(['login_status','last_login_ip','browser_name','security_key']);
        });
    }
}
