<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('equipos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nombre');
			$table->string('alias')->nullable();
			$table->integer('categoria_id')->unsigned();
			$table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
			$table->string('escudo');
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
		Schema::drop('equipos');
	}

}
