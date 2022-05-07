<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_title');
            $table->string('slider_description');
            $table->string('image_a');
            $table->string('heading1');
            $table->string('subheading1');
            $table->string('image_b')->nullable();
            $table->string('heading2')->nullable();
            $table->string('subheading2')->nullable();
            $table->string('image_c')->nullable();
            $table->string('heading3')->nullable();
            $table->string('subheading3')->nullable();
            $table->string('image_d')->nullable();
            $table->string('heading4')->nullable();
            $table->string('subheading4')->nullable();
            $table->string('image_e')->nullable();
            $table->string('heading5')->nullable();
            $table->string('subheading5')->nullable();
            $table->boolean('is_active')->default(1);
            $table->smallInteger('created_by');
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
        Schema::dropIfExists('sliders');
    }
}
