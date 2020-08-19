<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePossibleAnswersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('possibleAnswer', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('idPossibleAnswer');
			$table->integer('idQuestion')->unsigned();
			$table->string('description', 255)->nullable();
			$table->enum('isActive', [1, 0])->nullable(false)->default(1);
			$table->timestamps();

			$table->foreign('idQuestion')->references('idQuestion')
				->on('question')
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
		Schema::dropIfExists('possibleAnswer');
	}
}
