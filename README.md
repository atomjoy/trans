# Laravel Translations

Laravel translations from database.

## Install

```sh
composer require "atomjoy/trans"

composer update
composer dump-autoload -o
```

## Migrate, locales

```sh
# locales
php artisan lang:publish

# update tables
php artisan migrate

# new tables
php artisan migrate:fresh
```

## Laravel trans

lang/pl.json

```json
{
"This text not exists in db": "Ten tekst nie istnieje w bazie danych"
}
```

## Examples

routes/web.php

```php
<?php

use Illuminate\Support\Facades\Route;
use Trans\Models\Translate;

Route::get('/trans', function () {
 try {
  // Add translation for locale
  Translate::updateOrCreate([
   'locale' => 'pl', 'key' => 'Hello'
  ], ['value' => 'Witaj']);

  // Change locale
  app()->setLocale('pl');

  // If exists in db
  echo "<br> PL " . trans_db('Hello');
  // Or
  echo "<br> PL " . Translate::trans('Hello');

  // If not exists in db get translation from default trans() helper
  echo "<br> PL " . trans_db('This text not exists in db');
  // Or
  echo "<br> PL " . Translate::trans('This text not exists in db');
 } catch (Exception $e) {
  report($e);
  return 'Errors ...';
 }
});
```
