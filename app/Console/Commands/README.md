# Команды добавления данных

> 🚀 **Важно:** В проекте настроены Git Hooks для автопроверки кода. Подробнее в [README_GIT.md](./README_GIT.md).

## Добавление пользователя:
```shell
php artisan app:user-create {name} {email} {is_admin} {password}
```

## Добавление данных для пользователя:

### Добавление услуг пользователя по id:
```shell
php artisan app:fill-services-master {master_id}
```


## Как развернуть бд:
**Автоматически:**
```shell
make db-init
```
**Вручную:**
1) в php контейнере php bin/console doctrine:migrations:migrate
2) Заходим табличку users и находим юзера 1. Ставим ему логин и email *****
3) Заходим в табличку oauth2_client. Находим запись с name = "ecoportal-web-app". Заменяем значения полей:
identifier = e74d74cb53fa80ec186f263fe511f0a9
secret = 8de1ecc45d7eb8d3c9c2426a8271b826ffe26ea34756e04cda794211164088183d0ce89b310ed72758e0d2421f623e8c02effc0a2ba96b77c9a1c70a821fab9c

[PHPStorm + XDebug + Docker](https://habr.com/ru/articles/712670/)

(xdebug.client_host=) :~$ hostname -I

1) Настроить Settings -> PHP -> CLI interpreter (Docker Compose) (exec)
2) Настроить Settings -> PHP -> Servers 
3) Edit Configurations -> PHP Remote Debug 
4) localhost:8081 Server -> Use path -> Absolute path -> /var/www/app 

эта команда заставить гит игнорировать изменение прав доступа для текущего репозитория
git config core.fileMode false

```shell
php bin/console debug:router
sudo systemctl start docker
sudo chmod -R 777 .
sudo usermod -aG www-data $(whoami)
./vendor/bin/openapi --output public/doc.json src
echo "127.0.0.1 eco.loc" | sudo tee -a /etc/hosts
grep ecology.tatarstan.ru /etc/hosts
docker run -p 8082:8080 -e SWAGGER_JSON=/public/doc.json -v ${PWD}/public:/public swaggerapi/swagger-ui
cd /deployment/platform.tatar.dev
docker compose up -d
php bin/console doctrine:fixtures:load
php bin/console messenger:consume async gradient_maker failed sync --verbose
```

## Подключение фронта (локальная разработка)
Для локальной разработки необходимо вставить эту часть кода в ```vite.config.js```.
```
server: {
# Остальные параметры
    proxy: {
        '/api': {
            target: 'http://127.0.0.1:8081',
                changeOrigin: true,
                secure: false,
        },
        # Остальные параметры
    }
},
```

### VITE_CLIENT_ID, VITE_CLIENT_SECRET
Identifier и Secret должны совпадать с тем что на фронте
```shell
php bin/console league:oauth2-server:create-client "Trusted Password Client" e74d74cb53fa80ec186f263fe511f0a9 8de1ecc45d7eb8d3c9c2426a8271b826ffe26ea34756e04cda794211164088183d0ce89b310ed72758e0d2421f623e8c02effc0a2ba96b77c9a1c70a821fab9c \
--grant-type=password \
--grant-type=refresh_token \
--scope=all

php bin/console league:oauth2-server:list-clients
php bin/console league:oauth2-server:clear-expired-tokens
```

- http://eco.loc:8081/
- http://localhost:8082/#/

https://github.com/thephpleague/oauth2-server-bundle/blob/v0.5.0/docs/basic-setup.md

авторизация (почта/пароль)

# На основе этих данных миграция создаст суперпользователя
SUPERUSER_EMAIL="*****"
SUPERUSER_PASSWORD="*****"

https://github.com/theofidry/PsyshBundle
```shell
bin/console psysh
```

$table->getSql()

    public function uploadToEntity(Request $request): array

    private function upload(Request $request, FileDto $fileDto): void


cron для запуска команд (deployment/platform.tatar.dev/crontab, deployment/platform.tatar.ru/crontab)
Команды (src/Core/Command)

Запуск интеграции с АСЛН (asln)

при разработке

Локально в docker:
```shell
php bin/console asln:sync -a
php bin/console messenger:consume async
php bin/console messenger:consume asln
```

DB_HOST=127.0.0.1 MINIO_URL=http://127.0.0.1:9002 REDIS_URL=redis://127.0.0.1:6379 MESSENGER_TRANSPORT_DSN=amqp://guest:guest@127.0.0.1:5672/%2f/messages php bin/console asln:sync -a


Тестирование:
```shell
php bin/console doctrine:database:create --env=test
php bin/console doctrine:migrations:migrate --env=test --no-interaction
```

Настройте PhpStorm для использования phpunit.xml.dist
Откройте настройки PhpStorm:

Перейдите в File > Settings > PHP > Test Frameworks.
Выберите PHPUnit (или добавьте новую конфигурацию, если ее нет).

При редактировании/создании процедур (migrations/sql) и новых миграциях 
```shell
php bin/console doctrine:migrations:migrate
php bin/console doctrine:cache:clear-metadata
```

или

```shell
php bin/console doctrine:migrations:execute --up 'DoctrineMigrations\Version3000'
```

старые воркеры (процессы messenger:consume) не могут использовать обновлённый код — они загружают его в память при запуске и не перезагружают динамически. 
Поэтому их нужно убивать и перезапускать вручную (или через Supervisor), чтобы подхватить изменения.
Убьёт все процессы, содержащие эту строку в команде. Безопасно, если нет других совпадений.
```shell
pkill -f "messenger:consume"
```

## Как добавить новую методику и ПДК (модуль Лаборатория / Шаблоны лаборатории)

1. **Предпосылки (справочники):**  
   - `ProbeAgent` и связанное `ProbeSubstance` (у вещества должен быть `ministryDepartment`).  
   - `MethodicType`, `MethodicDoc`, `MethodicEquip` — любые валидные записи.  
   - `PdkType` для нужного вида проб.  
   - `Unit` и `MinistryDepartment` (ТУ) — обязательны.

2. **Создание методики (Methodic):**  
   - Поля обязательны: `probeAgent`, `probeSubstance`, `methodicType`, `methodicDoc`, `methodicEquip`, `ministryDepartment`.  
   - Номер методики (`methodicNumber`) — уникален в сочетании с `probeAgent + probeSubstance + methodicDoc + methodicEquip + methodicType`.  
   - Диапазоны: обязательно создать `MethodicDiapason` с `minValue`, `maxValue`, `isMinInclusive`, `isMaxInclusive`, `unit`, `toleranceType`, `ministryDepartment`. Без диапазона расчёт вернёт ошибку.

3. **Создание ПДК (Pdk / PdkValue):**  
   - `Pdk`: привяжите `pdkType` и **тот же** `probeSubstance` (и ТУ вещества).  
   - `PdkValue`: задайте `minValue/maxValue` (или одно поле), `unit`, `ministryDepartment` (лучше брать из `probeSubstance->ministryDepartment`), `name` по необходимости.

4. **Связка в шаблонах лаборатории:**  
   - В фикстурах показателей используйте `PdkValue`, у которого `pdk->probeSubstance` совпадает с `methodic->probeSubstance`.  
   - Если ПДК для вещества ещё нет — сначала создайте `Pdk`/`PdkValue` под ТУ вещества, а затем используйте его в показателях.

5. **Роли и доступы для пользователя:**  
   - Роль: достаточно `mon_ecomonitor_employee` (Специалист экомониторинга).  
   - У пользователя должны быть заполнены: `ministryDepartment` (ТУ), `organization`, `position` (любой), `role`.  
   - Гриды ПДК/методик фильтруют по ТУ пользователя: если ТУ не совпадает, увидите дубли или “пустые” записи. Используйте пользователя с тем же ТУ, что и у `probeSubstance/PdkValue`.

6. **Минимальный чек‑лист при добавлении новой методики и ПДК:**  
   - Добавили `ProbeSubstance` (с нужным ТУ).  
   - Создали/проверили `Pdk` + `PdkValue` для этого вещества.  
   - Создали `Methodic` для этого же вещества и вида пробы.  
   - Добавили `MethodicDiapason` для методики.  
   - Убедились, что пользователь с ролью `mon_ecomonitor_employee` имеет тот же `ministryDepartment`, что и вещество/ПДК/методика.

### Права/роли (экомониторинг)
- **Доменные роли (role_id):** для работы в лаборатории достаточно `mon_ecomonitor_employee` или старше (supervisor).  
- **Symfony-roles (поле roles в users):** для полного редактирования можно выдать `ROLE_SUPERADMIN` (см. фикстуру `UserFixtures`, пользователь `anon_monitor@etton.ru`).  
- **ТУ и организация:** у пользователя должны быть заполнены `ministryDepartment` (ТУ), `organization`, `position`; иначе гриды ПДК/методик могут фильтровать “в ноль” или показывать дубли.  
- **Как добавить права:**  
  1. В доменных ролях — назначьте нужный `role_id` (например, `mon_ecomonitor_employee`).  
  2. В symfony-ролях — проставьте массив `roles`, при необходимости `['ROLE_SUPERADMIN']` для полного доступа.  
  3. Заполните `ministryDepartment`, `organization`, `position` для корректной фильтрации по ТУ.

### Виды сведений
В смэв запрошены и получены следующие виды сведений для этого проекта:
execution-documents (test)
export-incomes
import-charges
export-payments
