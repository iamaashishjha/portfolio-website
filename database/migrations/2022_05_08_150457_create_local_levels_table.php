<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_levels', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('district_id');
            $table->string('code',20);
            $table->string('name_en',200)->nullable();
            $table->string('name_lc',200);
            $table->integer('ward_count')->nullable();
            $table->unsignedInteger('level_type_id')->nullable();

            $table->unique('code','uq_local_levels_type_code');
            // $table->unique('name_lc','uq_local_levels_type_name_lc');
            // $table->unique('name_en','uq_local_levels_type_name_en');
            $table->timestamps();

            // $table->foreign('district_id','fk_local_levels_district_id')->references('id')->on('districts');
            // $table->foreign('level_type_id','fk_local_levels_level_type_id')->references('id')->on('local_levels_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_levels');
    }
}
