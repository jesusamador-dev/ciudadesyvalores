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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name', 70)->nullable(false);
            $table->string('lastName', 70)->nullable(false);
            $table->string('motherLastName', 70)->nullable(false);
            $table->string('phone', 10)->nullable(false);
            $table->string('birthday', 10)->nullable(false);
            $table->enum('is_active', [1, 0])->nullable(false);
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
        Schema::dropIfExists('users');
    }
}
