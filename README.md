# Organization Life User Manual

Projek matakuliah MPPL
 Sistem untuk membantu kegiatan sehari hari ormawa di IPB
Front end web dan API menggunakan framework laravel

## Installasi Admin (web)

create new blank database check .env file
```
$ organization
```

### Installation Table list
Install the package with composer :
   ```
    composer require okipa/laravel-bootstrap-table-list:^2.0
   ```
if Service Provider still not installed , try :
   ```
    composer dump-autoload
   ```
### Installation Admin LTE

2. Install AdminLTE v3.0.0-alpha.2 via NPM :

   ```
   npm install admin-lte@v3.0.0-alpha.2 --save
   ```

3. Install FontAwesome 5 via NPM :

    ```
    npm install @fortawesome/fontawesome-free
    ```


4. Require the package using composer:

    ```
    composer require jeroennoten/laravel-adminlte
    ```

5. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```
    php JeroenNoten\LaravelAdminLte\ServiceProvider::class,
    ```

6. Publish the public assets:

    ```
    php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets
    ```

### Run the web  :
1. change directory to folder backend
```
$ cd organization
```
2. install composer to folder backend
```
$ composer install
```
3. setup .env file

4. migrate the database
```
$ php artisan migrate
```
5. run the laravel
```
$ php artisan serve
```
6. open this url in your browser
```
$ http://127.0.0.1:8000/
```
7. View all api routes
```
$ php artisan route:list
```

## Installasi User (mobile)

Lakukan installasi admin terlebih dahulu.

### Jalankan Aplikasinya :
1. Pindah ke direktori aplikasi
```
$ cd organization
```

2. Install NPM Dependencies :
```
npm install
```
    

2. install composer to folder backend
```
$ composer install
```
3. setup .env file

4. migrate the database
```
$ php artisan migrate
```
5. run the laravel
```
$ php artisan serve
```
6. open this url in your browser
```
$ http://127.0.0.1:8000/
```
7. View all api routes
```
$ php artisan route:list
```

