<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Todo extends Model
{
	use HasFactory;

	protected $fillable = [
		"title",
		"is_completed",
	];

	protected $casts = [
		"id" => "string"
	];

	protected static function boot()
	{
		parent::boot();

		static::creating(function ($model) {
			$model->id = str_replace("-", "", Str::uuid());
			$model->is_completed = false;
			if (!App::runningInConsole()) {
				$model->user_id = Auth::id();
			}
		});
	}
}
