<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('question_id')->nullable(false);
            $table->string('user_id', 100)->nullable(false);
            $table->string('answer', 255)->nullable(false);
            $table->enum('qualification', [1, 0])->nullable();
            $table->enum('is_active', [1, 0])->nullable(false);
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
