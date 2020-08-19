<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRafflesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('raffle', function (Blueprint $table) {
			$table->increments('idRaffle');
			$table->string('name')->nullable(false);
			$table->integer('userLimit')->nullable(false);
			$table->integer('limitLN')->nullable(false);
			$table->date('date')->nullable(false)->unique();
			$table->enum('isActive', [1, 0])->nullable(false)->default(1);
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
		Schema::dropIfExists('raffle');
	}
}
