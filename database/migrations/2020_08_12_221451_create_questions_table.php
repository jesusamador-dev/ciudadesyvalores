<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question', 200)->nullable(false);
            $table->enum('gradable', [1, 0])->nullable();
            $table->integer('questionary_id')->nullable(false);
            $table->enum('is_active', [1, 0])->nullable(false);
            $table->timestamps();

            //$table->foreign('questionary_id')->references('id')->on('questionnaires');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
