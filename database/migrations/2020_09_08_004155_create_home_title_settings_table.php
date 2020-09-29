<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTitleSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_title_settings', function (Blueprint $table) {
            $table->id();
            $table->string('donation_button_en')->nullable();
            $table->string('donation_button_bn')->nullable();
            $table->string('donar_title_en')->nullable();
            $table->string('donar_title_bn')->nullable();
            $table->string('blood_appoirment_en')->nullable();
            $table->string('blood_appoirment_bn')->nullable();
            $table->string('appoirment_button_en')->nullable();
            $table->string('appoirment_button_bn')->nullable();
            $table->string('gallery_title_en')->nullable();
            $table->string('gallery_title_bn')->nullable();
            $table->string('gallery_subtitle_en')->nullable();
            $table->string('gallery_subtitle_bn')->nullable();
            $table->string('blog_title_en')->nullable();
            $table->string('blog_title_bn')->nullable();
            $table->string('blog_subtitle_en')->nullable();
            $table->string('blog_subtitle_bn')->nullable();
            $table->longText('newsletter_summery_en')->nullable();
            $table->longText('newsletter_summery_bn')->nullable();
            $table->longText('about_text_en')->nullable();
            $table->longText('about_text_bn')->nullable();
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
        Schema::dropIfExists('home_title_settings');
    }
}
