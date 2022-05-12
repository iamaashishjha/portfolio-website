<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_lc')->nullable();
            $table->smallInteger('gender_id')->nullable();

            $table->string('birth_date_ad')->nullable();
            $table->string('birth_date_bs')->nullable();
            $table->smallInteger('citizen_province_id')->nullable();

            $table->smallInteger('citizen_district_id')->nullable();
            $table->string('citizenship_number')->nullable();
            $table->string('passport_number')->nullable();

            $table->string('voter_id_number')->nullable();

            $table->smallInteger('perm_province_id')->nullable();
            $table->smallInteger('perm_district_id')->nullable();
            $table->smallInteger('perm_local_level_id')->nullable();

            $table->smallInteger('perm_local_level_type_id')->nullable();
            $table->string('perm_ward_number')->nullable();
            $table->string('perm_tole')->nullable();

            $table->smallInteger('temp_province_id')->nullable();
            $table->smallInteger('temp_district_id')->nullable();
            $table->smallInteger('temp_local_level_id')->nullable();
            
            $table->smallInteger('temp_local_level_type_id')->nullable();
            $table->string('temp_ward_number')->nullable();
            $table->string('temp_tole')->nullable();


            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();

            $table->string('cast')->nullable();
            $table->string('category')->nullable();
            $table->string('category_source')->nullable();

            $table->string('education_qualification')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('other_identity')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grand_father_name')->nullable();

            $table->string('grand_mother_name')->nullable();

            $table->string('mariatal_status_id')->nullable();
            $table->string('wife_name')->nullable();
            $table->integer('total_family_member')->nullable();

            $table->string('profession')->nullable();
            $table->string('source_income')->nullable();

            $table->string('property_cash')->nullable();
            $table->string('property_fixed')->nullable();
            $table->string('property_share')->nullable();

            $table->string('property_other')->nullable();

            
            $table->string('party_post')->nullable();
            $table->string('committee_name')->nullable();
            $table->string('party_lebidar')->nullable();
            
            $table->string('party_joined_date_ad')->nullable();
            $table->string('party_joined_date_bs')->nullable();
            $table->string('party_location')->nullable();

            $table->string('political_background')->nullable();


            $table->string('own_image')->nullable();
            $table->string('sign_image')->nullable();
            $table->string('citizenship_front')->nullable();

            $table->string('citizenship_back')->nullable();
            $table->string('passport_front')->nullable();
            $table->string('passport_back')->nullable();

            $table->string('license_image')->nullable();
            $table->string('pan_front')->nullable();
            $table->string('pan_back')->nullable();

            $table->integer('verified_by')->nullable();

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
        Schema::dropIfExists('memberships');
    }
}
