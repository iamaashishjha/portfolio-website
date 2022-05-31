<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsMasterDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('category_image')->nullable();
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

        Schema::create('news_tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('tag_image')->nullable();
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

        Schema::create('news_posts', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('post_image')->nullable();
            $table->string('post_date')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->string('slug')->nullable();
            $table->bigInteger('views')->default(0);
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->boolean('is_deleted')->default(0);
            $table->timestamps();
            $table->softDeletes();

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
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('news_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('news_post_news_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('news_post_id')
                ->nullable()
                ->constrained('news_posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('news_tags_id')
                ->nullable()
                ->constrained('news_tags')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('news_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->timestamps();

            $table->foreignId('news_id')
                ->constrained('news_posts')
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
        Schema::dropIfExists('news_categories');

        Schema::dropIfExists('news_tags');

        Schema::dropIfExists('news_posts');

        Schema::dropIfExists('news_posts_news_tags');

        Schema::dropIfExists('news_comments');

        
    }
}
