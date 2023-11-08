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
