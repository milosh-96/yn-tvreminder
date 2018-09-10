<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('show_id')->unsigned();
            $table->foreign('show_id')->references('id')->on('shows')->onDelete('cascade');

            $table->boolean('weekly')->default(true);
            $table->date('date_range_start')->nullable();
            $table->date('date_range_end')->nullable();
            $table->boolean('monday')->default(false);
            $table->boolean('tuesday')->default(false);
            $table->boolean('wednesday')->default(false);
            $table->boolean('thursday')->default(false);
            $table->boolean('friday')->default(false);
            $table->boolean('saturday')->default(false);
            $table->boolean('sunday')->default(false);

            $table->boolean('onetime_event')->default(false);
            $table->date('onetime_date')->nullable();
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->integer('duration')->unsigned()->nullable();

            $table->boolean('email_notification')->default(true);
            $table->boolean('push_notification')->default(true);
            $table->boolean('sms_notification')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
