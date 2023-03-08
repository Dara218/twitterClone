<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('retweet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('original_user_id');
            $table->foreignId('post_id');
            $table->string('comment_value');
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->integer('retweets')->default(0);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
