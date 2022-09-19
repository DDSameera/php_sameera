# SaleRep Info

## Installation

1. Clone the Git project `git clone https://github.com/digixsameera/php_sameera.git`
2. Rename `.env.example` to `.env`
3. Add DB Settings

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=php_sameera
DB_USERNAME=root
DB_PASSWORD=
```

4. Open Command Prompt > go to project folder > Type Following Commands

```
cd php_sameera
```

5. Install Dependencies

```
composer install
composer dump
```

7. Install Test Data
```
php artisan key:generate
php artisan migrate:fresh --seed
php artisan optimize
php artisan optimize:clear
```

6. Run Test Cases

```
php artisan test
```
