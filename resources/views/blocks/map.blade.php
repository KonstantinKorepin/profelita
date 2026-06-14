@if(!is_null($data['master']->lat) && !is_null($data['master']->lng))
    <div id="map_wrapper">
        <div id="map_service"></div>
        <div id="map_info">
            <h3 class="text-center">Контакты</h3>
            <div class="contacts">
                <a href="tel:{{ preg_replace('/[\s-]/', '', $data['master']->phone) }}" class="phone">
                    <i class="fa-solid fa-phone"></i>
                    <span>{{ $data['master']->phone }}</span>
                </a>
                <p class="address">
                    <strong>Адрес:</strong> г. {{ $data['city']->name }}, {{ $data['master']->address }}
                </p>
                <p>
                    <strong>График работы:</strong> с {{ $data['master']->start_working_hours }} до
                    {{ $data['master']->end_working_hours }}, без выходных
                </p>
                <p>
                    <strong>E-mail:</strong> <a href="mailto: info@profelita.ru">info@profelita.ru</a>
                </p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        ymaps.ready(init);

        function init() {
            var myMap = new ymaps.Map("map_service", {
                center: [{{ $data['master']->lat }}, {{ $data['master']->lng }}], // 54.30702, 48.31966
                // Уровень масштабирования. Допустимые значения:
                // от 0 (весь мир) до 19.
                zoom: 12,
                controls: ['zoomControl', 'searchControl', 'typeSelector', 'fullscreenControl', 'routeButtonControl']
            }, {
                suppressMapOpenBlock: false,
                searchControlProvider: 'yandex#search'
            });
            var myPlacemark = new ymaps.Placemark([{{ $data['master']->lat }}, {{ $data['master']->lng }}], {
                iconContent: '{{ $data['master']->specialization->name }} в {{ $data['city']->prepositional }}'
            }, {
                preset: 'islands#nightStretchyIcon'
            });
            myMap.geoObjects.add(myPlacemark);
        }
    </script>
@endif
