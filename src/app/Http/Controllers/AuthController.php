<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
	public function register(Request $request)
	{
		$validator = Validator::make($request->only(["email", "password"]), [
			"email" => "required|string|email|unique:users",
			"password" => "required|string|min:8|max:16"
		], [
			"email.unique" => "既に登録済みのメールアドレスです",
			"password.required" => "パスワードが未入力です",
			"password.min" => "パスワードが8文字未満になってます",
			"password.max" => "パスワードが16文字を超えています",
		]);

		if ($validator->fails()) {
			return redirect("/signup")->withErrors($validator)->withInput();
		}
 
		$user = new User([
			"email" => $request->email,
			"password" => Hash::make($request->password),
		]);

		User::query()->create([
			"email" => $request->email,
			"password" => Hash::make($request->password),
		]);

		Auth::login($user);

		return redirect("/todo");
	}

	public function unregister()
	{
	}

	public function login(Request $request)
	{
		$credentials = $request->only(["email", "password"]);

		$validator = Validator::make($credentials, [
			"email" => "required|string|email|exists:users",
			"password" => "required|string"
		], [
			"email.exists" => "存在しないアカウントです",
			"password.required" => "パスワードが未入力です",
		]);

		if ($validator->fails()) {
			return redirect("/login")->withErrors($validator)->withInput();
		}

		if (Auth::attempt($credentials)) {
			return redirect("/todo");
		}

		return redirect("/login")->withErrors(["password" => "パスワードが違います"])->withInput();
	}

	public function logout()
	{
		Auth::logout();

		return redirect("/login");
	}
}
