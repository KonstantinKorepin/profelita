<!-- Каталог услуг BEGIN -->
<div class="service-menu-list">
    <div class="title">
        <h3>Каталог услуг</h3>
    </div>
    <div class="list">
        <ul>
            @foreach ($services as $service)
                <li><a href="{{ $service->url }}">{{ $service->catalog_name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- Каталог услуг END -->
