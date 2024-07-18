<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use App\Http\Middleware\RedirectAuthenticatedUser;
use Illuminate\Support\Facades\Route;

Route::middleware(RedirectAuthenticatedUser::class)->group(function () {
	Route::get("/", function () {
		return view("home");
	});
	Route::get("/signup", function () {
		return view("signup");
	});
	Route::get("/login", function () {
		return view("login");
	})->name("login");
});

Route::middleware("auth")->group(function() {
	Route::get("/profile", function () {
		return view("profile");
	})->name("profile");
	
	Route::as("todo.")->group(function () {
		Route::get("/todo", [TodoController::class, "index"])->name("index");
		Route::get("/todo/create", [TodoController::class, "create"])->name("create");
		Route::get("/todo/edit/{id}", [TodoController::class, "edit"])->name("edit");
		Route::post("/todo", [TodoController::class, "store"])->name("store");
		Route::patch("/todo/{id}", [TodoController::class, "update"])->name("update");
		Route::patch("/todo/{id}/toggle-complete", [TodoController::class, "toggleComplete"])->name("toggle-complete");
		Route::delete("/todo/{id}", [TodoController::class, "destroy"])->name("destroy");
	});
});

Route::prefix("auth")->as("auth.")->group(function () {
	Route::post("/register", [AuthController::class, "register"])->name("register");
	Route::post("/login", [AuthController::class, "login"])->name("login");
	Route::post("/logout", [AuthController::class, "logout"])->name("logout");
});
