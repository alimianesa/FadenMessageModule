<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MessageUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faden_message_user', function (Blueprint $table) {
            // Pivot
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('message_id');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('message_id')
                ->on('faden_messages')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Time
            $table->unsignedBigInteger('received_at')->nullable();
            $table->unsignedBigInteger('watched_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_user');
    }
}
