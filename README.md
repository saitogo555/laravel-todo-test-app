# Laravel Todo App (Test)

このリポジトリはLaravelの練習のために作ったToDoアプリケーションです。

## 必須環境

- Docker (Docker Desktop, Docker Engine)
- Hyper-V (Windowsのみ)
- WSL2 (Windowsのみ)

※Hyper-VとWSL2はどちらか一方がセットアップされている必要があります。

## 実行手順

1. `git clone https://github.com/saitogo555/laravel-todo-test-app.git`を実行してリポジトリをクローンする
2. `cd laravel-todo-test-app`を実行してプロジェクトフォルダに移動する。
3. `docker compose up -d`を実行してコンテナを起動する。
4. `docker compose exec php bash`を実行してphpコンテナ内に入る。
5. `cd /var/www/laravel-todo-app`を実行してプロジェクトフォルダに移動する。
6. `composer install`を実行してパッケージをインストールする。
7. `cp .env.local .env`を実行して環境ファイルを複製する。
8. `php artisan key:generate`を実行してAPI_KEYを生成する。
9. `php artisan migrate`を実行してデータベースをセットアップする。
10. `php artisan db:seed`を実行してダミーデータを追加する。
11. ブラウザのアドレスバーに`http://localhost:8080`を入力してサイトにアクセスする。

## phpMyAdmin

`http://localhost:8081`でアクセス出来ます。