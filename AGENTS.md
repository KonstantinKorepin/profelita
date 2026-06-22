# Контекст проекта

- Проект: profelita.local
- Стек: Laravel

# Архитектурные решения

## PageDataProvider → Стратегия

Текущий подход с наследованием от `PageDataProvider` решено переписать на паттерн **Стратегия**.

### План рефакторинга

1. Создать `PageDataStrategyInterface` с методом `getData(Url $url): array`
2. Создать отдельные классы-стратегии (без extends):
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

# Статус

- [x] Переписать на стратегию
- [x] Подчистить `get()->first()` и null checks
- [x] DI вместо `new`
- [ ] Вынести SQL из провайдеров
