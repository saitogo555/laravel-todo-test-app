<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
	public function index()
	{
		$user_id = Auth::id();

		$completed_todos = Todo::query()->where([
			["user_id", "=", $user_id],
			["is_completed", "=", true],
		])->get();

		$incompleted_todos = Todo::query()->where([
			["user_id", "=", $user_id],
			["is_completed", "=", false],
		])->get();
		
		return view("todo.index", compact("completed_todos", "incompleted_todos"));
	}

	public function create()
	{
		return view("todo.create");
	}

	public function store(Request $request)
	{
		$data = $request->only(["title"]);

		$validator = Validator::make($data, [
			"title" => "required|min:3|max:30"
		], [
			"title.required" => "タイトルが未入力です",
			"title.min" => "タイトルが3文字未満になってます",
			"title.max" => "タイトルが30文字を超えています",
		]);

		if ($validator->fails()) {
			return redirect(route("todo.create"))->withErrors($validator)->withInput();
		}

		Todo::query()->create($data);

		return redirect(route("todo.index"));
	}

	public function show(string $id)
	{
		//
	}

	public function edit(string $id)
	{
		$todo = Todo::query()->where("id", "=", $id)->first();
		if (!$todo) {
			abort(404);
		}
		return view("todo.edit", compact("todo", "id"));
	}

	public function update(Request $request, string $id)
	{
		$data = $request->only(["title"]);

		$validator = Validator::make($data, [
			"title" => "required|min:3|max:30"
		], [
			"title.required" => "タイトルが未入力です",
			"title.min" => "タイトルが3文字未満になってます",
			"title.max" => "タイトルが30文字を超えています",
		]);

		if ($validator->fails()) {
			return redirect(route("todo.edit", ["id" => $id]))->withErrors($validator)->withInput();
		}

		Todo::query()->firstWhere("id", "=", $id)->update($data);

		return redirect(route("todo.index"));
	}

	public function toggleComplete(string $id)
	{
		$todo = Todo::query()->findOrFail($id);
		$todo->is_completed = !$todo->is_completed;
		$todo->save();

		return redirect(route("todo.index"));
	}

	public function destroy(string $id)
	{
		$todo = Todo::query()->findOrFail($id);
		$todo->delete();

		return redirect(route("todo.index"));
	}
}
