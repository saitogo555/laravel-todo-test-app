@php
$errorMsgTitle = $errors->first("title");
@endphp

@extends("layouts.app")

@section("head")
<link rel="stylesheet" href="{{ asset("css/create.css") }}">
@endsection

@section("content")
<div class="create container">
  <h1 class="create__heading">タスクの新規作成</h1>
  <form class="create-form" action="{{ route("todo.store") }}" method="post">
    @csrf
    <div class="create-block">
      <h2 class="create-block__heading">タイトル</h2>
      <div class="create-block-body">
        <input
          class="create-block__input {{ $errorMsgTitle ? "error" : "" }}"
          type="text"
          name="title"
          value="{{ old("title") }}"
          placeholder="タイトルを入力してください"
          required
        >
        <ul class="create-block-helper">
          <li class="create-block-helper__item">3文字以上30文字以下</li>
        </ul>
        @if ($errorMsgTitle)
        <span class="create-block__error">{{ $errorMsgTitle }}</span>
        @endif
      </div>
    </div>
    <div class="create-actions">
      <button class="create__submit">作成する</button>
      <a class="create__cancel" href="{{ route("todo.index") }}">キャンセルする</a>
    </div>
  </form>
</div>
@endsection