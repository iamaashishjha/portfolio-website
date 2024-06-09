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
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('slider_subscribe_email')->nullable();
            $table->string('slider_subscribe_zip')->nullable();

            $table->string('subscribe_us_email')->nullable();

            $table->string('contact_us_name')->nullable();
            $table->string('contact_us_email')->nullable();
            $table->string('contact_us_message')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('doc_image')->nullable();
            $table->string('doc_file')->nullable();
            $table->text('url')->nullable();
            $table->boolean('is_actve')->nullable()->default(true);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name_en');
            $table->string('name_lc');
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('provinces', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name_en', 200)->nullable();
            $table->string('name_lc', 200);
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name_en', 200)->nullable();
            $table->string('name_lc', 200);
            $table->boolean('is_active')->nullable();
            $table->foreignId('province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            $table->index('province_id', 'idx_districts_province_id');
        });

        Schema::create('local_level_types', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name_en');
            $table->string('name_lc');
            $table->string('local_level_count')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('local_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code', 20);
            $table->string('name_en', 200)->nullable();
            $table->string('name_lc', 200);
            $table->integer('ward_count')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('level_type_id')->constrained('local_level_types')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            
        });
        
        Schema::create('identity_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_lc')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_lc')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('data');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('provinces');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('local_level_types');
        Schema::dropIfExists('local_levels');
        Schema::dropIfExists('identity_types');
        Schema::dropIfExists('types');
    }
}
