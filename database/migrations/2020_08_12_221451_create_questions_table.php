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
        Schema::create('question', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idQuestion');
            $table->string('question', 200)->nullable(false);
            $table->enum('gradable', [1, 0])->nullable();
            $table->integer('idQuestionary')->unsigned();
            $table->enum('isActive', [1, 0])->nullable(false)->default(1);
            $table->timestamps();

            $table->foreign('idQuestionary')->references('idQuestionary')
                ->on('questionary')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
