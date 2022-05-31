<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMasterDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('event_image')->nullable();
            $table->string('venue')->nullable();
            $table->string('start_date_time')->nullable();
            $table->text('location_map')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->boolean('is_deleted')->default(0);
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');

    }
}
