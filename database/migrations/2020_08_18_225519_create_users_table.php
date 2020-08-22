<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id')->default(2);
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('blood_group')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('divition_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('upazila')->nullable();
            $table->string('local_area')->nullable();
            $table->string('association')->nullable();
            $table->string('profile')->nullable();
            $table->longText('about')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
