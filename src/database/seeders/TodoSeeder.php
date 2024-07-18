<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TodoSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		Todo::query()->delete();
		
		User::all("id")->each(function ($user) {
			Todo::factory(10)->create([
				"user_id" => $user->id
			]);
		});
	}
}
