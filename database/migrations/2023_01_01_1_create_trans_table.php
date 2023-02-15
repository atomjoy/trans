<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('translates', function (Blueprint $table) {
			$table->id();
			$table->string('locale')->nullable()->default('en');
			$table->string('key');
			$table->string('value');
			$table->timestamps();

			$table->unique(['locale', 'key']);
		});
	}

	public function down()
	{
		Schema::dropIfExists('translates');
	}
};