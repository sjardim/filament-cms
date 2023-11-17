<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->string('subtitle')->nullable();

            //Intro:
            $table->text('intro')->nullable();

            //Hero image:
            $table->string('hero_image_copyright')->nullable();
            $table->string('hero_image_title')->nullable();

            //Publishing:
            $table->timestamp('publishing_begins_at')->nullable();
            $table->timestamp('publishing_ends_at')->nullable();
            $table->index('publishing_begins_at');
            $table->index('publishing_ends_at');

            //SEO:
            $table->string('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->json('seo_keywords')->nullable();

            //Overview:
            $table->string('overview_title')->nullable();
            $table->text('overview_description')->nullable();

            //Content blocks:
            $table->json('content_blocks')->default(new Expression('(JSON_ARRAY())')); //Default only works on JSON on MySQL 8 or newer

            //Slug:
            $table->string('slug');

            //Author:
            $table->unsignedBigInteger('author_id')->nullable();
            $table->foreign('author_id')
                ->references('id')->on('users')->onDelete('set null');

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
