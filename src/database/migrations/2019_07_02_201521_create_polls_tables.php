<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamp('expiration')->nullable();
            $table->char('event_id', 36);
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('text')->nullable();
            $table->timestamps();
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('order')->default(0);
            $table->unsignedSmallInteger('score')->default(0);
            $table->char('poll_id', 36);
            $table->text('text');
        });

        Schema::create('votes', function (Blueprint $table) {
            $table->char('user_id', 36);
            $table->unsignedInteger('answer_id');
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
        Schema::dropIfExists('polls');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('votes');
    }
}
