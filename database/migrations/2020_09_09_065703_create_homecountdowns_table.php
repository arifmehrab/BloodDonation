<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomecountdownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homecountdowns', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('count_number_en')->nullable();
            $table->string('count_number_bn')->nullable();
            $table->string('title_english')->nullable();
            $table->string('title_bangla')->nullable();
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
        Schema::dropIfExists('homecountdowns');
    }
}
