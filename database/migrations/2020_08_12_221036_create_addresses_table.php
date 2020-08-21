<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idAddress');
            $table->integer('idUser')->unsigned();
            $table->string('street', 80)->nullable(false);
            $table->string('neighborhood', 120)->nullable(false);
            $table->string('city', 50)->nullable(false);
            $table->string('state', 40)->nullable(false);
            $table->string('country', 50)->nullable(false);
            $table->string('postalCode', 10)->nullable(false);
            $table->string('outdoorNumber', 10)->nullable(false);
            $table->string('interiorNumber', 10)->nullable();
            $table->string('references', 220)->nullable();
            $table->string('typeAddress', 30)->nullable(false)->default(1);
            $table->enum('isActive', [1, 0])->nullable(false)->default(1);
            $table->timestamps();

            $table->foreign('idUser')->references('idUser')
                ->on('user')
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
        Schema::dropIfExists('address');
    }
}
