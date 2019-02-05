# backend-flutter

### installation
    1. composer create-project --prefer-dist laravel/lumen 'projectName'
    2. php -S localhost:8000 -t public

#### setup project
    1. Generate APP_KEY
storage/web.php
```
    $router->get('/key', function () use ($router) {
        return str_random(32);
    });
```  

#### setup database
    setup config database pada file .env
```
    DB_CONNECTION=mysql 'type database postgres, mysql dll'
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=namaDatabase
    DB_USERNAME=namaUserDatabase
    DB_PASSWORD=passwordDatabase
```

##### run postgres docker
    [start postgres with docker] (https://github.com/Kinto/kinto/wiki/How-to-run-a-PostgreSQL-server%3F)


#### setup base auth
    1. uncomment script berikut yang ada di folder bootstrap/app.php

```
    $app->withFacades();
```
```
    $app->withEloquent();
```

```
    $app->routeMiddleware([
        'auth' => App\Http\Middleware\Authenticate::class,
    ]);
```
```
    $app->register(App\Providers\AppServiceProvider::class);
```
```
    $app->register(App\Providers\AuthServiceProvider::class);
```

#### create table database with migration
    1. create migration
    jalankan perintah berikutntuk membuat migration yang akan di generate ke dalam bentuk table

```
    php artisan make:migration CreateTableNameTable --create="namaTAble"
```
    2. generate migration ke database
```
    php artisan migrate
```