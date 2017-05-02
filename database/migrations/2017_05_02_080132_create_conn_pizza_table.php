<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnPizzaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conn_pizza', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('pizza_type_id', 36)->index('fk_connection_pizza_type1_idx');
			$table->string('ingridients_id', 36)->index('fk_connection_ingridients1_idx');
			$table->string('cheese_id', 36)->index('fk_connection_cheese1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conn_pizza');
	}

}
