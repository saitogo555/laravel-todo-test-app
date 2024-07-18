@php
  $errorMsgTitle = $errors->first("title");
@endphp

@extends("layouts.app")

@section("head")
<link rel="stylesheet" href="{{ asset("css/edit.css") }}">
@endsection

@section("content")
<div class="edit container">
  <h1 class="edit__heading">タスクの編集</h1>
  <form class="edit-form" action="{{ route("todo.update", ["id" => $id]) }}" method="post">
    @csrf
    @method("patch")
    <div class="edit-block">
      <h2 class="edit-block__heading">タイトル</h2>
      <div class="edit-block-body">
        <input
          class="edit-block__input {{ $errorMsgTitle ? "error" : "" }}"
          type="text"
          name="title"
          value="{{ old("title") ?? $todo->title }}"
          placeholder="タイトルを入力してください"
          required
        >
        <ul class="edit-block-helper">
          <li class="edit-block-helper__item">3文字以上30文字以下</li>
        </ul>
        @if ($errorMsgTitle)
        <span class="edit-block__error">{{ $errorMsgTitle }}</span>
        @endif
      </div>
    </div>
    <div class="edit-actions">
      <button class="edit__submit">更新する</button>
      <a class="edit__cancel" href="{{ route("todo.index") }}">キャンセルする</a>
    </div>
  </form>
</div>
@endsection