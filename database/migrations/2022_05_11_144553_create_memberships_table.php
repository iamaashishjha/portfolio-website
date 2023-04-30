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
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('cast')->nullable();
            $table->string('category')->nullable();
            $table->string('category_source')->nullable();
            $table->string('education_qualification')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('other_identity')->nullable();
            // citizenship 
            $table->string('name_en')->nullable();
            $table->string('name_lc')->nullable();
            $table->string('birth_date_ad')->nullable();
            $table->string('birth_date_bs')->nullable();
            $table->string('citizenship_number')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('voter_id_number')->nullable();
            $table->string('perm_ward_number')->nullable();
            $table->string('perm_tole')->nullable();
            $table->string('temp_ward_number')->nullable();
            $table->string('temp_tole')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('grand_father_name')->nullable();
            $table->string('grand_mother_name')->nullable();
            $table->string('mariatal_status_id')->nullable();
            $table->string('wife_name')->nullable();
            $table->integer('total_family_member')->nullable();

            // property 
            $table->string('profession')->nullable();
            $table->string('source_income')->nullable();
            $table->string('property_cash')->nullable();
            $table->string('property_fixed')->nullable();
            $table->string('property_share')->nullable();
            $table->string('property_other')->nullable();

            // party political
            $table->string('party_post')->nullable();
            $table->string('committee_name')->nullable();
            $table->string('party_lebidar')->nullable();
            $table->string('party_joined_date_ad')->nullable();
            $table->string('party_joined_date_bs')->nullable();
            $table->string('party_location')->nullable();
            $table->string('political_background')->nullable();

            // document 
            $table->string('own_image')->nullable();
            $table->string('sign_image')->nullable();
            $table->string('citizenship_front')->nullable();
            $table->string('citizenship_back')->nullable();
            $table->string('passport_front')->nullable();
            $table->string('passport_back')->nullable();
            $table->string('license_image')->nullable();
            $table->string('pan_front')->nullable();
            $table->string('pan_back')->nullable();

            //general
            $table->boolean('is_verified')->default(false);
            $table->bigInteger('verification_code')->default(1);

            $table->foreignId('gender_id')
                ->nullable()
                ->constrained('genders')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('citizen_province_id')
                ->nullable()
                ->constrained('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('citizen_district_id')
                ->nullable()
                ->constrained('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('perm_province_id')
                ->nullable()
                ->constrained('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('perm_district_id')
                ->nullable()
                ->constrained('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('perm_local_level_id')
                ->nullable()
                ->constrained('local_levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('perm_local_level_type_id')
                ->nullable()
                ->constrained('local_level_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('temp_province_id')
                ->nullable()
                ->constrained('provinces')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('temp_district_id')
                ->nullable()
                ->constrained('districts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('temp_local_level_id')
                ->nullable()
                ->constrained('local_levels')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('temp_local_level_type_id')
                ->nullable()
                ->constrained('local_level_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->dateTime('approved_at')->nullable();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('membership_id')
                ->nullable()
                ->constrained('memberships')
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
        Schema::dropIfExists('memberships');
    }
}
