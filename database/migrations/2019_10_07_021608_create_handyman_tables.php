<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHandyManTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('password');

            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('location');
            $table->string('address');
            $table->string('image');
            $table->tinyInteger('verified');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('providers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('location');
            $table->string('address');
            $table->string('image');
            $table->tinyInteger('verified');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('category_id')->index('category_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('user_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id')->index('provider_id');
            $table->unsignedBigInteger('category_id')->index('category_id');
            $table->unsignedBigInteger('service_id')->index('service_id');
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('service_id')->references('id')->on('services');
        });

        Schema::create('job_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('provider_id')->index('provider_id');
            $table->unsignedBigInteger('category_id')->index('category_id');
            $table->text('professional_summary');
            $table->string('experience');
            $table->string('certificate');
            $table->string('job_location');
            $table->text('job_address');
            $table->timestamps();

            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index('user_id');
            $table->unsignedBigInteger('provider_id')->index('provider_id');
            $table->string('category');
            $table->string('service');
            $table->date('book_date');
            $table->time('time_from');
            $table->time('time_to');
            $table->string('location');
            $table->text('address');
            $table->text('additional_info');
            $table->enum('status', ['Pending','Completed','Accepted','Declined']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('provider_id')->references('id')->on('providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('providers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('services');
        Schema::dropIfExists('user_services');
        Schema::dropIfExists('job_profiles');
        Schema::dropIfExists('bookings');
    }
}
