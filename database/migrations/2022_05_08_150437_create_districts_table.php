<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('province_id');
            $table->string('code',20);
            $table->string('name_en',200)->nullable();
            $table->string('name_lc',200);
            $table->timestamps();
            
            $table->unique('code','uq_districts_code');
            $table->unique('name_lc','uq_districts_name_lc');
            $table->unique('name_en','uq_districts_name_en');
            $table->index('province_id','idx_districts_province_id');
            // $table->foreign('province_id','fk_districts_province_id')->references('id')->on('provinces');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
