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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_lc')->nullable();
            $table->string('membership_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('birth_date_ad')->nullable();
            $table->string('birth_date_bs')->nullable();
            $table->string('own_image')->nullable();
            $table->string('sign_image')->nullable();
            $table->boolean('is_verified')->default(false);
            $table->bigInteger('verification_code')->default(1);
            $table->foreignId('gender_id')->constrained('genders')->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('verified_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->dateTime('verified_at')->nullable();
            $table->softDeletes();
        });

        Schema::create('member_general_details', function (Blueprint $table) {
            $table->id();
            $table->string('cast')->nullable();
            $table->string('category')->nullable();
            $table->string('category_source')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('grand_mother_name')->nullable();
            $table->string('mariatal_status_id')->nullable();
            $table->string('wife_name')->nullable();
            $table->integer('total_family_member')->nullable();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('member_identities', function (Blueprint $table) {
            $table->id();
            $table->string('identity_number');
            $table->string('identity_issued_date_ad');
            $table->string('identity_issued_date_bs');
            $table->string('identity_image')->nullable();
            $table->foreignId('identity_issued_province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('identity_issued_district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->foreignId('identity_type_id')->constrained('identity_types')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('member_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perm_province_id')->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('perm_district_id')->constrained('districts')->cascadeOnDelete();
            $table->foreignId('perm_local_level_id')->constrained('local_levels')->cascadeOnDelete();
            $table->string('perm_ward_number');
            $table->string('perm_tole')->nullable();
            $table->foreignId('temp_province_id')->nullable()->constrained('provinces')->cascadeOnDelete();
            $table->foreignId('temp_district_id')->nullable()->constrained('districts')->cascadeOnDelete();
            $table->foreignId('temp_local_level_id')->nullable()->constrained('local_levels')->cascadeOnDelete();
            $table->string('temp_ward_number')->nullable();
            $table->string('temp_tole')->nullable();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('member_properties', function (Blueprint $table) {
            $table->id();
            $table->string('profession')->nullable();
            $table->string('source_income')->nullable();
            $table->string('property_cash')->nullable();
            $table->string('property_fixed')->nullable();
            $table->string('property_share')->nullable();
            $table->string('property_other')->nullable();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('member_party_details', function (Blueprint $table) {
            $table->id();
            $table->string('party_post')->nullable();
            $table->string('party_committee_name')->nullable();
            $table->string('party_lebidar')->nullable();
            $table->string('party_joined_date')->nullable();
            $table->string('party_location')->nullable();
            $table->text('political_background')->nullable();
            $table->foreignId('member_id')->constrained('members')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('member_id')->nullable()->constrained('members')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
        Schema::dropIfExists('member_general_details');
        Schema::dropIfExists('member_identities');
        Schema::dropIfExists('member_addresses');
        Schema::dropIfExists('member_properties');
        Schema::dropIfExists('member_party_details');
    }
}
