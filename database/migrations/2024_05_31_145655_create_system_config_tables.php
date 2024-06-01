<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemConfigTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->nullable();
            $table->string('site_title_image')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_active')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->string('company_name_en')->nullable();
            $table->string('company_name_lc')->nullable();
            $table->text('company_description')->nullable();
            $table->string('logo_image')->nullable();

            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('email_address')->nullable();
            $table->string('company_address')->nullable();
            $table->string('total_members')->nullable();

            $table->text('google_map')->nullable();
            $table->text('facebook_link')->nullable();
            $table->text('twitter_link')->nullable();
            $table->text('instagram_link')->nullable();

            $table->string('start_date_ad')->nullable();
            $table->string('start_date_bs')->nullable();

            $table->text('about_us')->nullable();
            $table->text('our_history')->nullable();
            $table->text('our_mission')->nullable();
            $table->text('our_vision')->nullable();
            $table->string('our_mission_image')->nullable();
            $table->string('our_vision_image')->nullable();
            $table->text('home_about_content')->nullable();
            $table->string('president_name')->nullable();
            $table->string('president_image')->nullable();
            $table->text('message_from_president')->nullable();
            $table->boolean('is_active')->nullable();
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
        Schema::dropIfExists('app_settings');
        Schema::dropIfExists('company_details');
    }
}
