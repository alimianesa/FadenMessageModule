<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFadenMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faden_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("message_type")->nullable();
            $table->foreign('message_type')
                ->references('id')
                ->on('faden_message_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            // Author
            $table->integer("author_id");
            $table->string("bc")->nullable();
            $table->string('to');
            $table->string('cc')->nullable();

            // Content
            $table->text("body")->nullable();
            $table->string("title")->nullable();
            $table->string("subtitle")->nullable();

            // Push
            $table->string("push_title")->nullable();
            $table->string("push_sound")->nullable();
            $table->text("push_body")->nullable();
            $table->boolean("push_bulk")->nullable();


            // Active
            $table->boolean('active');
            $table->string('priority')->nullable();
            $table->unsignedBigInteger("sent_at");

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
        Schema::dropIfExists('faden_messages');
    }
}
