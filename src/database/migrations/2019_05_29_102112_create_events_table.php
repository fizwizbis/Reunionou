<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->uuid('id');
            $table->char('title', 255);
            $table->text('description');
            $table->timestamp('date')->useCurrent();
            $table->char('token', 16);
            $table->unsignedBigInteger('author');
            $table->char('address', 255);
            $table->boolean('public');
            $table->timestamps();

            $table->primary('id');
            $table->unique('token');

            $table->foreign('author')->references('id')->on('users');
        });

        Schema::create('users_events', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->uuid('event_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_events');
        Schema::dropIfExists('events');
    }
}
