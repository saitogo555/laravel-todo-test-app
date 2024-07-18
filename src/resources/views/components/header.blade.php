<header>
  <div class="h">
    <h1 class="h-logo">
      <a href="{{ Auth::check() ? " /todo" : "/" }}">
        <img class="h-logo__img" src="{{ asset("image/logo.png") }}" alt="">
      </a>
    </h1>
    @guest
    <nav class="h-nav">
      <ul>
        <li>
          <a href="/features">
            機能
          </a>
        </li>
        <li>
          <a href="">
            メニュー
          </a>
        </li>
        <li>
          <a href="">
            メニュー
          </a>
        </li>
        <li>
          <a href="">
            メニュー
          </a>
        </li>
      </ul>
    </nav>
    <div class="h-actions">
      <a class="h-btn h-btn--login" href="/login">ログイン</a>
      <a class="h-btn h-btn--register" href="/signup">新規登録</a>
    </div>
  </div>

  @endguest
  @auth
  <a class="h-profile" href="{{ route("profile") }}">
    <img class="h-profile__icon" src="{{ asset("image/user.png") }}" alt="user icon">
    <ul class="h-profile-menu">
      <li>
        <a class="" href="">メニュー</a>
      </li>
      <li>
        <a href="">メニュー</a>
      </li>
      <li>
        <a href="">メニュー</a>
      </li>
      <li>
        <a href="">メニュー</a>
      </li>
      <li>
        <form action="{{ route("auth.logout") }}" method="post">
          @csrf
          <button>ログアウト</button>
        </form>
      </li>
    </ul>
  </a>

  @endauth
  </div>
</header>