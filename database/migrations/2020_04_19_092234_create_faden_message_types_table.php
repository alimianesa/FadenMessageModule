<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFadenMessageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faden_message_types', function (Blueprint $table) {
            $table->id();
            $table->string("key");

            // Content
            $table->text("description")->nullable();
            $table->string("title")->nullable();
            $table->string("subtitle")->nullable();

            // Active
            $table->boolean('active');
            $table->unsignedBigInteger("sends_in")->nullable();
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
        Schema::dropIfExists('faden_message_types');
    }
}
