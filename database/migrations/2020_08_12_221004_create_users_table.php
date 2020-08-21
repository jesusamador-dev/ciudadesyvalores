<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('idUser')->primary()->unsigned();
            $table->string('name', 70)->nullable(false);
            $table->string('lastName', 70)->nullable(false);
            $table->string('motherLastName', 70)->nullable(false);
            $table->string('phone', 10)->nullable(false);
            $table->string('birthday', 10)->nullable(false);
            $table->enum('isActive', [1, 0])->nullable(false)->default(1);
            $table->timestamps();


            $table->foreign('idUser')->references('idAccess')
                ->on('access')
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
        Schema::dropIfExists('user');
    }
}
