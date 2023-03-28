<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('country_statistics', function (Blueprint $table) {
			$table->id();
			$table->text('code');
			$table->json('name');
			$table->integer('confirmed')->unsigned();
			$table->integer('recovered')->unsigned();
			$table->integer('critical')->unsigned();
			$table->integer('deaths')->unsigned();
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
		Schema::dropIfExists('country_statistics_migration');
	}
};
