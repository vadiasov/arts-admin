# vadiasov/arts-admin
"Arts" means images of an album or of a track of album or of track without album.

* This package creates DB arts (it includes migrations to create DB artists.). 
* It serves CRUD pages for arts in administrative panel. 
* It includes button "order".
* It includes button "cover" to select the cover of the album or of the track.

## Installation
Add the package to root composer.json:
````
"require": {
        ...
        "vadiasov/arts-admin": "^x.x.x",
  }
````
Then run:
````
composer update
````
Register package in config/app.php
````
'providers' => [
        /*
         * Package Service Providers...
         */
        Vadiasov\ArtsAdmin\ArtsAdminServiceProvider::class,
````
Create model:
````
php artisan make:model Art
````
Migrate:
````
php artisan migrate --path=/vendor/vadiasov/arts-admin/src/Migrations
````
Create directory to keep arts:
````
mkdir storage/ap/public/arts
chmod -R 777 storage/ap/public/arts
````
