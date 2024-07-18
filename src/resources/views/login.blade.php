@php
  $errorMsgEmail = $errors->first("email");
  $errorMsgPassword = $errors->first("password");
@endphp

@extends("layouts.app")

@section("head")
<link rel="stylesheet" href="{{ asset("css/login.css") }}">
@endsection

@section("content")
<div class="login">
  <form class="login-form" action="{{ route("auth.login") }}" method="POST">
    <h1 class="login__heading">ログイン</h1>
    <div class="login-block">
      <input
        class="login__input {{ $errorMsgEmail ? "error" : "" }}"
        type="email"
        name="email"
        value="{{ old("email") }}"
        placeholder="Email"
        required
      >
      @if ($errorMsgEmail)
        <span class="login__error">{{ $errorMsgEmail }}</span>
      @endif
    </div>
    <div class="login-block">
      @csrf
      <input 
        class="login__input {{ $errorMsgPassword ? "error" : "" }}"
        type="password"
        name="password"
        value="{{ old("password") }}"
        placeholder="Password"
        required
      >
      @if ($errorMsgPassword)
        <span class="login__error">{{ $errorMsgPassword }}</span>
      @endif
    </div>
    <button class="login__submit">ログイン</button>
    <p class="login__text">まだアカウント作成してない方は<a href="/signup">こちら</a>から</p>
  </form>
</div>
@endsection