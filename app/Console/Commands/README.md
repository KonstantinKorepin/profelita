# Команды добавления данных

## Добавление пользователя:
```shell
php artisan app:user-create {name} {email} {is_admin} {password}
```

## Добавление данных для пользователя:

### Добавление услуг мастера по id:
```shell
php artisan app:fill-services-master {master_id}
```

### Добавление URL самого мастера по id:
```shell
php artisan app:url-generating-master {master_id}
```

### Генерация карты мастера по id:
```shell
php artisan app:sitemap-generating-master {master_id}
```
в **sitemap_master_{master_id}.xml** добавятся URL-ы для добавления в общую карту сайта.

### Добавление URL города по id:
```shell
php artisan app:url-generating-city {city_id}
```

### Генерация карты города по id:
```shell
php artisan app:sitemap-generating-city {city_id}
```
в **sitemap_city_{city_id}.xml** добавятся URL-ы для добавления в общую карту сайта.
