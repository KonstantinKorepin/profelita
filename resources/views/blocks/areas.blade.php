@if($data['areas'])
    <h2 class="text-center">Работаем во всех районах {{ $data['city']->genitive }}</h2>
    <div class="descr-block">
        <div class="page-content">
            @foreach($data['areas'] as $area => $description)
                <div class="area-item">
                    <h3>{{ $area }}</h3>
                    @if($description)
                        <p>
                            {{ $description }}
                        </p>
                    @else
                        <p></p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endif
