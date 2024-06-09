<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogMasterDataTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('category_image')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
            
        });

        Schema::create('blog_tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('tag_image')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('alt_text')->nullable();
            $table->string('post_image')->nullable();
            $table->string('post_date')->nullable();
            $table->boolean('featured')->default(0);
            $table->bigInteger('views')->default(0);
            $table->string('meta_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('status')->default(false)->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('updated_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('deleted_by')->nullable()->constrained('users')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('blog_categories')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('blog_post_blog_tags', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('blog_post_id')->nullable()->constrained('blog_posts')->cascadeOnDelete();
            $table->foreignId('blog_tags_id')->nullable()->constrained('blog_tags')->cascadeOnDelete();
        });

        Schema::create('blogs_comments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->foreignId('post_id')->constrained('blog_posts')->cascadeOnDelete();
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
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_posts');
        Schema::dropIfExists('blog_posts_blog_tags');
        Schema::dropIfExists('blogs_comments');
    }
}
