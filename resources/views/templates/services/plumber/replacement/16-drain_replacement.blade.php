<div class="descr-block ">
    <h1>{{ $data['service']->h1 }}</h1>
    <div class="page-content">
        <p>
            Ниже описан весь процесс оказания данной услуги.
        </p>
        <p class="phone_desc">
            Заказать замену слива в {{ $data['city']->prepositional }} Вы можете по номеру
            <a href="tel:{{ $data['master']->getClearPhone() }}">{{ $data['master']->phone }}</a>
        </p>
        <h2>Цены на замену слива</h2>
        @if (!in_array($data['city']->code, ['msk', 'spb']))
            @include('templates.services.plumber.price.15-drain')
        @else
            @include('templates.services.plumber.price.15-drain_capital')
        @endif
        <h2>Этапы замены слива</h2>
        <ul>
            <li>
                Проводится тщательный осмотр текущей сантехники, чтобы определить состояние слива и выявить проблемы,
                если они есть.
            </li>
            <li>
                Составляется список необходимых материалов и оборудования, которые понадобятся для замены слива.
            </li>
            <li>
                Демонтаж старого слива и проведение чистки, чтобы обеспечить оптимальную работу новой системы.
            </li>
            <li>
                Установка нового слива.
            </li>
        </ul>
        <p>
            Весь процесс будет проводится с большой осторожностью и вниманием к деталям, чтобы гарантировать надежность
            и долговечность нового слива.
        </p>
        <p class="phone_desc">
            Номер телефона сантехника в {{ $data['city']->prepositional }}
            <a href="tel:{{ $data['master']->getClearPhone() }}">{{ $data['master']->phone }}</a>
        </p>
    </div>
</div>
