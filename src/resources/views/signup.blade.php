@php
  $errorMsgEmail = $errors->first("email");
  $errorMsgPassword = $errors->first("password");
@endphp

@extends("layouts.app")

@section("head")
<link rel="stylesheet" href="{{ asset("css/signup.css") }}">
@endsection

@section("content")
<div class="signup">
  <form class="signup-form" action="{{ route("auth.register") }}" method="POST">
    <h1 class="signup__heading">新規登録</h1>
    <div class="signup-block">
      <input
        class="signup__input {{ $errorMsgEmail ? "error" : "" }}"
        type="email"
        name="email"
        value="{{ old("email") }}"
        placeholder="Email"
        required
      >
      @if ($errorMsgEmail)
        <span class="signup__error">{{ $errorMsgEmail }}</span>
      @endif
    </div>
    <div class="signup-block">
      @csrf
      <input 
        class="signup__input {{ $errorMsgPassword ? "error" : "" }}"
        type="password"
        name="password"
        value="{{ old("password") }}"
        placeholder="Password"
        required
      >
      <span class="signup__helper">半角英数字記号8文字以上16文字以内</span>
      @if ($errorMsgPassword)
        <span class="signup__error">{{ $errorMsgPassword }}</span>
      @endif
    </div>
    <button class="signup__submit">新規登録</button>
    <p class="signup__text">既にアカウント作成済みの方は<a href="/login">こちら</a>から</p>
  </form>
</div>
@endsection