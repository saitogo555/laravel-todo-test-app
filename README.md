# Laravel Todo App (Test)

このリポジトリはLaravelの練習のために作ったToDoアプリケーションです。

## 実行方法

1. このリポジトリをクローン又はzipでダウンロードして任意のフォルダに展開する。
2. ターミナルから展開したフォルダに移動。
3. `docker compose up -d`を実行してコンテナを起動する。
4. `docker compose exec php bash`を実行してphpコンテナ内に入る。
5. `cd /var/www/laravel-todo-app`を実行してプロジェクトフォルダに移動する。
6. `composer install`を実行してパッケージをインストールする。
7. `php artisan serve`を実行して開発サーバーを起動する。
8. ブラウザのアドレスバーに`http://localhost:8080`を入力してサイトにアクセスする。

## phpMyAdmin

`http://localhost:8081`でアクセス出来ます。