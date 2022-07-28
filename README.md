## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

# Nest Pharma Portal Laravel Backend

## Building

### Pre-requisites:
Nest Pharma has a few requirements to run:

1. PHP 8.1+
2. Laravel v9.0+
3. Livewire v2.0+
4. Install laravel using composer: https://laravel.com/docs/9.x/installation#installation-via-composer
5. Install Postgresql v14 server using WSL2 or Docker Desktop
6. It is recommended to setup Postgresql reachable on localhost
7. Install HeidiSQL for DB management: https://www.heidisql.com/download.php 

### Create a local Postgres database for development

```sql
CREATE USER nest_pharma WITH PASSWORD 'nest_pharma';
CREATE DATABASE nest_pharma OWNER nest_pharma;
GRANT ALL PRIVILEGES ON DATABASE nest_pharma TO nest_pharma;
```

Note: Postgres 14 and below require superuser privilege to install extensions. So connect to `nest_pharma` DB as the `postgres` user and create the following extensions:

```sql
CREATE EXTENSION IF NOT EXISTS citext;
```

### Install application dependencies and DB migration

```sh
git clone ssh://git@git.bitsathy.ac.in:2222/MadhanPrasath/nest-pharma.git

cd nest-pharma
cp .env.example .env
composer install
php artisan migrate
php artisan key:generate

# Create an admin user for the Laravel Nest Pharma backend
php artisan make:filament-resource User

# add user email in .env SUPER_ADMIN_EMAIL 

php artisan db:seed

php artisan serve

# Access Nest Pharma at http://localhost:8000/admin
```
