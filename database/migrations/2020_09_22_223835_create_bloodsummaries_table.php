<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateBloodsummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloodsummaries', function (Blueprint $table) {
            $table->id();
            $table->longText('about_content')->nullable();
            $table->longText('summery_rules')->nullable();
            $table->longText('summery_section_one')->nullable();
            $table->longText('summery_section_two')->nullable();
            $table->longText('summery_section_three')->nullable();
            $table->longText('summery_section_four')->nullable();
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
        Schema::dropIfExists('bloodsummaries');
    }
}
