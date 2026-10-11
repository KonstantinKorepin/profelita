# Локальный запуск

Команды выполняются из корня проекта.

1. Скопируйте `.env.example` в `.env`, а `docker/.env.example` в `docker/.env`.
2. Задайте одинаковый пароль в `DB_PASSWORD` (Laravel) и `MYSQL_ROOT_PASSWORD` (Docker).
3. Запустите контейнеры:

   ```bash
   docker compose --env-file docker/.env -f docker/docker-compose.yaml up -d --build
   ```

4. При первом запуске установите зависимости и создайте ключ приложения:

   ```bash
   docker compose --env-file docker/.env -f docker/docker-compose.yaml exec php composer install
   docker compose --env-file docker/.env -f docker/docker-compose.yaml exec php php artisan key:generate
   ```

Сайт: http://localhost:3000. MySQL с компьютера: `127.0.0.1:3306`; из PHP-контейнера: `db:3306`.

Xdebug запускается по триггеру: включите отладку через расширение браузера Xdebug Helper или параметр `XDEBUG_TRIGGER=1` в URL. Обычные запросы не запускают отладочную сессию.

При `APP_ENV=local` или `testing` внешние счётчики аналитики и виджет Jivo не подключаются. Карты загружаются только в блоке, который их использует.

Дамп `docker/mysql/dump.sql` импортируется только при инициализации нового тома `mysql_data`. Обычный `down` сохраняет данные; `down -v` удаляет том с базой. Изменение `MYSQL_ROOT_PASSWORD` не меняет пароль в уже созданной базе.
