# UrlShortener
### Небольшой проект на Laravel 8, позволяющий сокращать ссылки.
Инструкция по развёртыванию проекта:
- Клонируйте репозиторий и перейдите к нему:
```
git clone https://github.com/KirillKopylov/UrlShortener.git
cd ./UrlShortener
```
- выполните установку зависимостей:
```
composer install
```
- скопируйте конфиг:
```
cp ./.env.example ./.env
```
- сгенерируйте ключ приложения:
```
php artisan key:generate
```
- в .env укажите параметры подключения к базе данных и выполните миграции:
```
php artisan migrate
```
Выбор сервера остаётся за вами. В качестве альтернативы:
```
php artisan serve
```
