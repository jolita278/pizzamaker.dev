<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToConnPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('conn_pizza', function(Blueprint $table)
		{
			$table->foreign('cheese_id', 'fk_connection_cheese1')->references('id')->on('cheese')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('ingridients_id', 'fk_connection_ingridients1')->references('id')->on('ingridients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pizza_type_id', 'fk_connection_pizza_type1')->references('id')->on('pizza_type')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('conn_pizza', function(Blueprint $table)
		{
			$table->dropForeign('fk_connection_cheese1');
			$table->dropForeign('fk_connection_ingridients1');
			$table->dropForeign('fk_connection_pizza_type1');
		});
	}

}
