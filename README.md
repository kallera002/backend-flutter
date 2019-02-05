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
