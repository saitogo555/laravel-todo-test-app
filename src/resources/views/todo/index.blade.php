@extends("layouts.app")

@section("head")
<link rel="stylesheet" href="{{ asset("css/todo.css") }}">
@endsection

@section("script")
<script src="{{ asset("js/todo.js") }}"></script>
@endsection

@section("content")
<div class="todo container">
  <a class="todo__link" href="/todo/create">タスクを作成する</a>
  <div class="todo-area">
    <h2 class="todo__heading">未完</h2>
    <div class="todo-list">
      {{-- {{ dd($incompleted_todos) }} --}}
      @foreach ($incompleted_todos as $todo)
        <div class="todo-item">
          <p>{{ $todo->id }}</p>
          <h3 class="todo__title">{{ $todo->title }}</h3>
          <div class="todo-actions">
            <form action="{{ route("todo.toggle-complete", $todo->id) }}" method="post">
              @csrf
              @method("patch")
              <button class="todo__btn todo__btn--complete">完了にする</button>
            </form>
            <a class="todo__btn todo__btn--edit" href="{{ route("todo.edit", $todo->id) }}">編集</a>
            <form action="{{ route("todo.destroy", $todo->id) }}" method="post" onsubmit=" return confirmDelete()">
              @csrf
              @method("delete")
              <button class="todo__btn todo__btn--delete">削除</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="todo-area completed">
    <h2 class="todo__heading">完了</h2>
    <div class="todo-list">
      @foreach ($completed_todos as $todo)
        <div class="todo-item">
          <p>{{ $todo->id }}</p>
          <h3 class="todo__title">{{ $todo->title }}</h3>
          <div class="todo-actions">
            <form action="{{ route("todo.toggle-complete", $todo->id) }}" method="post">
              @csrf
              @method("patch")
              <button class="todo__btn todo__btn--complete">未完了にする</button>
            </form>
            <a class="todo__btn todo__btn--edit" href="{{ route("todo.edit", $todo->id) }}">編集</a>
            <form action="{{ route("todo.destroy", $todo->id) }}" method="post" onsubmit=" return confirmDelete()">
              @csrf
              @method("delete")
              <button class="todo__btn todo__btn--delete">削除</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection