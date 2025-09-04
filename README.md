## 日文單字冊~自主測驗

<p align="center">
<a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Build Status"></a>
</p>

- 新增自己專屬的單字冊
- 根據條件隨機產生題目自主測驗

![image](https://raw.githubusercontent.com/JKinga0779/upload_01/refs/heads/main/wordcard_jp/wordcard_jp_readme_01.PNG)

## 安裝步驟
#### 1.於所在資料夾中啟動cmd

#### 2.安裝 composer
```cmd
composer install 
```
#### 3.修改.env命名資料庫設定
 ![image](https://raw.githubusercontent.com/JKinga0779/upload_01/refs/heads/main/wordcard_jp/wordcard_jp_readme_02.PNG)
#### 4.新增資料表
```cmd
php artisan migrate
```
#### 5.產生key
```cmd
php artisan key:generate
```
#### 6.連接上傳資料路徑
```cmd
php artisan storage:link
```
#### 7.啟動網站
```cmd
php artisan serve
```