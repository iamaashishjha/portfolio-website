<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_footers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('telephone')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_active')->default(1);
            $table->string('start_date')->nullable();
            $table->timestamps();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

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
            $table->timestamps();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('deleted_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


        Schema::create('data', function(Blueprint $table){
            $table->id();
            $table->string('slider_subscribe_email')->nullable();
            $table->string('slider_subscribe_zip')->nullable();
            $table->timestamps();
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            
            $table->string('code');

            $table->string('name_en');
            $table->string('name_lc');

            $table->timestamps();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code',20);
            $table->string('name_en',200)->nullable();
            $table->string('name_lc',200);

            $table->unique('code','uq_provinces_code');
            $table->unique('name_lc','uq_provinces_name_lc');
            $table->unique('name_en','uq_provinces_name_en');
            
            $table->timestamps();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name_en', 200)->nullable();
            $table->string('name_lc', 200);
            $table->timestamps();

            $table->unique('code', 'uq_districts_code');
            $table->unique('name_lc', 'uq_districts_name_lc');
            $table->unique('name_en', 'uq_districts_name_en');
            $table->index('province_id', 'idx_districts_province_id');

            $table->foreignId('province_id')
                ->nullable()
                ->constrained('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('local_level_types', function (Blueprint $table) {
            $table->id();
            $table->string('code');

            $table->string('name_en');
            $table->string('name_lc');

            $table->string('local_level_count')->nullable();
            
            $table->timestamps();
        });

        Schema::create('local_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code',20);
            $table->string('name_en',200)->nullable();
            $table->string('name_lc',200);
            $table->integer('ward_count')->nullable();

            $table->unique('code','uq_local_levels_type_code');

            $table->timestamps();

            $table->foreignId('district_id')
            ->nullable()
            ->constrained('districts')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreignId('level_type_id')
            ->nullable()
            ->constrained('local_level_types')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('header_footers');

        Schema::dropIfExists('sliders');

        Schema::dropIfExists('genders');

        Schema::dropIfExists('provinces');

        Schema::dropIfExists('districts');

        Schema::dropIfExists('local_levels');

        Schema::dropIfExists('local_level_types');
    }
}
