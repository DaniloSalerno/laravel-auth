# Passaggi Iniziali
- Creazione progetto
```bash
laravel new nomeprogetto

cd nomeprogetto
```
- Installazione pacchetto breeze
```bash
composer require laravel/breeze --dev

php artisan breeze:install
```

- Installazione Bootstrap e Sass
```bash
composer require pacificdev/laravel_9_preset

php artisan preset:ui bootstrap --auth

npm i

npm run dev

php artisan serve
```

- Rinomina File vite.config.js oppure eliminate "type": "module", da package.json


# Connessione al database

- Modifica in .env 
```php
FILESYSTEM_DISK=public
```


- Modifica in config/filsystems 
```php
'default' => env('FILESYSTEM_DISK', 'public'),
```

- 
```bash
php artisan storage:link
```


# 

- Cancello guest.blade.php & edit.blade.php

- Effettuo migrazione

- Creo DashboardController
```bash
php artisan make:controller Admin/DashboardController
```

- Faccio il return della view della dashboard

```php
class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
```

- In web.php 
```php
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});
```

- Modifica in RouteServiceProvider.php riga 20
```php
public const HOME = '/admin';
```