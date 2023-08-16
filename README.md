## Laravel Repository Design Pattern

A simple Laravel project with repository design pattern

## Usage
- Clone Project From Git
- Run ```cd laravel-repository```
- Run ```composer update```
- Run ```cp .env.example .env```
- Enter Your Database Info in ```.env``` File
- Run ```php artisan key:generate```
- Run ```php artisan migrate --seed```
- Run ```php artisan serve```

I used sqlite db in this project. You can use any databases like (Mysql, Postgres)


## How to change Mysql Database?
- 1: Create a database (DB Name: ```laravel_repository```)
- 2: In ```.env``` File, set below parameters

- ```DB_CONNECTION=mysql```
- ```DB_HOST=127.0.0.1```
- ```DB_PORT=3306```
- ```DB_DATABASE=laravel_repository```
- ```DB_USERNAME=root```
- ```DB_PASSWORD=```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
