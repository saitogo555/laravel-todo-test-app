<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create("todos", function (Blueprint $table) {
			$table->string("id", 32)->primary();
			$table->string("title");
			$table->boolean("is_completed");
			$table->foreignUlid("user_id");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists("todos");
	}
};
