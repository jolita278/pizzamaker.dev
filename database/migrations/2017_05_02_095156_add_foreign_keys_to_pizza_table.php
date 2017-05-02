<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pizza', function(Blueprint $table)
		{
			$table->foreign('cheese_id', 'fk_pizza_cheese1')->references('id')->on('cheese')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('type_id', 'fk_pizza_pizza_type')->references('id')->on('pizza_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pizza', function(Blueprint $table)
		{
			$table->dropForeign('fk_pizza_cheese1');
			$table->dropForeign('fk_pizza_pizza_type');
		});
	}

}
