# PiGLy - 体重管理アプリ

## 概要
PiGLyは、日々の体重、摂取カロリー、運動時間、運動内容を簡単に記録・管理できるWebアプリです。  
目標体重の設定や体重の推移を確認することができ、モバイル・PC両方で快適に利用可能です。

---

## 主な機能

- ユーザー登録 / ログイン / ログアウト  
- 目標体重の設定・編集  
- 体重ログのCRUD（作成・一覧表示・編集・削除）  
- 摂取カロリー、運動時間（00:00形式対応）、運動内容の記録  
- モーダルでのデータ追加  
- 日付範囲検索  
- ページネーション（1ページ8件表示）  
- 最新体重・目標体重までの差の表示  
- シンプルで直感的なUI（ピンク紫のグラデーションをアクセントに使用）

## 技術スタック

- PHP 8.x  
- Laravel 10.x    
- MySQL 8.x  
- HTML / CSS（グラデーション・モーダル）  


## 環境構築
1. リポジトリをクローン
```bash
git clone git@github.com:as0622as/Pigly-new.git
cd Pigly-new

2. Dockerで環境を立ち上げ
docker compose up -d --build

3. Laravelコンテナへ入る
docker compose exec php bash

4. 依存パッケージをインストール
composer install

5. .envファイルを作成
cp .env.example .env

6. アプリケーションキー生成
php artisan key:generate

7. マイグレーション実行
php artisan migrate

8. ストレージリンク作成
php artisan storage:link

5. ブラウザでhttp://localhost にアクセス

## ER図

![ER図](docs/Pigly.drawio.png)
