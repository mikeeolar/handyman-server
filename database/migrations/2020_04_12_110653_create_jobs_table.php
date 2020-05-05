<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provider_id')->index('provider_id');
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->unsignedBigInteger('booking_id')->index('booking_id');
            $table->enum('status', ['Pending','Completed','Accepted','Declined','Started','Cancelled']);
            $table->timestamp('accepted_at');
            $table->dateTime('started_at')->nullable();
            $table->dateTime('completed_at')->nullable();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
