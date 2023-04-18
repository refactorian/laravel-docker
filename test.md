Laravel開発(Docker)
====
Laravel開発(Docker環境構築)に関する情報を以下に記載する。

## ■事前準備

* インストール
* docker for desktop 
* WindowsはWSL2推奨（/home配下にgit cloneする)

## ■.env設定

* `APP_URL=http://localhost`　※localhostにする
* `DB_HOST=db` ※コンテナ名にする

## ■初期構築

* `cd docker`
* `docker-compose up -d`
* Windowsのみ：`exec winpty bash`
* `docker-compose exec php bash`
* `find /var/www/storage -type d -print0 | xargs -0 chmod 707`
* `cp .env.docker .env`
* `composer install`
* `php artisan migrate:refresh --seed`
* `npm install`
* `npm run dev`

## ■帳票利用時初期設定
* `find /var/www/public/tmp -type d -print0 | xargs -0 chmod 777`

## ■起動（初期構築後はこちらでOK）

* `docker-compose up -d`

## ■docker閉じる

* `docker-compose down`

## ■開発時のJSコンパイル

* `npm run watch-poll`
* Laravel-MixにJS統合したため、上記で変更監視しておくと楽

## ■キュー実行

* `php artisan queue:work`

## ■その他

* php-stormのターミナルをgitbash設定推奨
* 上記設定があれば、そのままターミナル上で初期設定等が可能になる
* php-storm上のDB接続が直接可能

以上
