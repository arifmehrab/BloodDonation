<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesettingonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homesettingones', function (Blueprint $table) {
            $table->id();
            $table->longText('header_top_title_en')->nullable();
            $table->longText('header_top_title_bn')->nullable();
            $table->string('banner_title_en')->nullable();
            $table->string('banner_title_bn')->nullable();
            $table->string('donar_regi_title_en')->nullable();
            $table->string('donar_regi_title_bn')->nullable();
            $table->text('donar_regi_subtitle_en')->nullable();
            $table->text('donar_regi_subtitle_bn')->nullable();
            $table->string('donar_regi_button_en')->nullable();
            $table->string('donar_regi_button_bn')->nullable();
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
        Schema::dropIfExists('homesettingones');
    }
}
