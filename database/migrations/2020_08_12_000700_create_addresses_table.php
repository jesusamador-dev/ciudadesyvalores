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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 50)->nullable(false);
            $table->string('street', 80)->nullable(false);
            $table->string('neighborhood', 120)->nullable(false);
            $table->string('city', 50)->nullable(false);
            $table->string('state', 40)->nullable(false);
            $table->string('country', 50)->nullable(false);
            $table->string('postalCode', 10)->nullable(false);
            $table->string('outdoorNumber', 10)->nullable(false);
            $table->string('interiorNumber', 10)->nullable();
            $table->string('references', 220)->nullable();
            $table->enum('is_active', [1, 0])->nullable(false);
            $table->timestamps();

            //$table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
