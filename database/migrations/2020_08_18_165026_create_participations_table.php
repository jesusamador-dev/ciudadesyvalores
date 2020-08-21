<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation', function (Blueprint $table) {
            $table->integer('ticket');
            $table->integer('idUser')->unsigned();
            $table->integer('idRaffle')->unsigned();
            $table->enum('isActive', [1, 0])->nullable(false)->default(1);
            $table->timestamps();

            $table->foreign('idRaffle')->references('idRaffle')
                ->on('raffle')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idUser')->references('idUser')
                ->on('user')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->primary(['ticket', 'idUser', 'idRaffle']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participation');
    }
}
