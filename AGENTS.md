# Контекст проекта

- Проект: profelita.local
- Стек: Laravel

# Архитектурные решения

## PageDataProvider → Стратегия

Текущий подход с наследованием от `PageDataProvider` решено переписать на паттерн **Стратегия**.

### План рефакторинга

1. Создать `PageDataStrategyInterface` с методом `getData(Url $url): array`
2. Создать отдельные классы-стратегии (bez extends):
   - `App\Services\PageDataProvider\CityPageStrategy`
   - `App\Services\PageDataProvider\MasterPageStrategy`
   - `App\Services\PageDataProvider\ServicePageStrategy`
3. Стратегии получают зависимости через DI в конструктор
4. `PageDataProviderFactory` — не статическая, с DI
5. Фабрика использует `match` для выбора стратегии по типу (`url->entity_class`)
6. Абстрактный класс `PageDataProvider` — удалить
7. Старые `*PageDataProvider` — удалить

### Что поправить по ходу

- `get()->first()` заменить на `find()` / `firstOrFail()`
- Добавить null checks везде
- Сервисы через `resolve()` или DI, а не через `new`
- Сырые SQL запросы вынести в репозитории (опционально, следующий шаг)

## Рефакторинг моделей

- Убраны `HasFactory` (кроме User), `$table`, docblock от ide-helper
- `$timestamps = false` где нет created_at/updated_at в таблице
- `env()` заменён на `config()` везде в коде
- SEO-тексты вынесены в `config/seo.php`
- `CitySeoTagsData` удалён (дублирование)

## Рефакторинг DTO

- `SessionDto` переписан на `readonly class` с constructor promotion
- Геттеры/сеттеры заменены на публичные readonly свойства

## Рефакторинг SQL

- Сырые SQL-запросы вынесены из стратегий в `ServiceRepository`
- Запросы переписаны на `Service::query()` с join
- Группировка данных осталась в `ServiceService`

# Статус

- [x] Переписать на стратегию
- [x] Подчистить `get()->first()` и null checks
- [x] DI вместо `new`
- [x] Вынести SQL из провайдеров в репозитории
- [x] Рефакторинг моделей (убрать HasFactory, $table, docblock)
- [x] SEO-тексты в config/seo.php
- [x] DTO через readonly class

# Следующий шаг: рефакторинг Mail

Папка `app/Mail` — 5 классов почты. Проблемы и план:

### Проблемы

1. `attachments()` везде пустой — можно убрать
2. `Queueable`, `SerializesModels` подключены, но `ShouldQueue` не implemented — очереди нет
3. Дублирование в `content()->with` — все классы делают `$this->request->input(...)`
4. Субъекты (subject) захардкожены русскими строками — вынести в конфиг

### План

1. Убрать `attachments()` из всех классов ✓
2. ~~Убрать `Queueable`, `SerializesModels` (очередь не используется)~~ ✓
3. ~~Вынести общую логику в базовый класс или trait~~ — оставить как есть, классы компактные
4. Субъекты вынести в `config/services.php` → `mailer.subjects` ✓

### Будущее: прикрутить очереди

- Вернуть `Queueable`, `SerializesModels`
- Добавить `implements ShouldQueue`
- Настроить драйвер очереди (Redis/DB)
- Переключить с `Mail::send()` на `Mail::queue()`
