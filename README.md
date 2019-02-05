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