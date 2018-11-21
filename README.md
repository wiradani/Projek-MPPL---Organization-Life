# Projek-MPPL---admin-LTE
Projek matakuliah MPPL
 Sistem untuk membantu kegiatan sehari hari ormawa di IPB
Front end web dan API menggunakan framework laravel

create new blank database check .env file
```
$ organization
```
## 1. Installation Admin LTE

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-adminlte
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    > Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider

    ```
    php JeroenNoten\LaravelAdminLte\ServiceProvider::class,
    ```

3. Publish the public assets:

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
