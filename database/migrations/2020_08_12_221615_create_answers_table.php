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
        Schema::create('answer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('idQuestion')->unsigned();
            $table->integer('idUser')->unsigned();
            $table->string('answer', 255)->nullable(false);
            $table->enum('qualification', [1, 0])->nullable();
            $table->enum('isActive', [1, 0])->nullable(false)->default(1);
            $table->timestamps();

            $table->foreign('idQuestion')->references('idQuestion')
                ->on('question')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idUser')->references('idUser')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['idQuestion', 'idUser']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer');
    }
}
