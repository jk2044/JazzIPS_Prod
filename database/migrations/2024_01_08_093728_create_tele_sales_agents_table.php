<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeleSalesAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tele_sales_agents', function (Blueprint $table) {
            $table->id('agent_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->unique();
            $table->boolean('status');
            $table->boolean('islogin');
            $table->string('call_status');
            $table->datetime('today_login_time');
            $table->datetime('today_logout_time');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('session_id')->nullable()->unique(); // Add this line
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
        Schema::dropIfExists('tele_sales_agents');
    }
}
