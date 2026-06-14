@extends('layouts.layout')

@section('content')

    <div class="container">
        <div class="row">
        @include('layouts.big-image-service')
        <!-- хлебные крошки BEGIN -->
            <div class="breadcrumbs">
                <ul>
                    @foreach ($data['breadcrumbs'] as $key => $breadcrumb)
                        @if (is_null($breadcrumb['url']))
                            <li>{{ $breadcrumb['name'] }}</li>
                        @else
                            <li><a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a></li>
                        @endif
                        @if ($key < (count($data['breadcrumbs']) - 1))
                                <li><i class="fa-solid fa-angles-right"></i></li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!-- хлебные крошки END -->
            <div class="inner">
                <aside>
                    <!-- Список услуг по направлению BEGIN -->
                    <div class="service-menu-list">
                        <div class="title">
                            <h3>{{ $data['caption'] }}</h3>
                        </div>
                        <div class="list">
                            <ul>
                                @foreach ($data['serviceList'] as $item)
                                    <li>
                                        <a @if ($item['active']) class="active" @endif
                                        href="{{ $item['url'] ?? 'javascript: void(0);' }}">
                                            {{ $item['catalog_name'] }}
                                        </a>
                                        @if (isset($item['list']))
                                            <a href="javascript: void(0);" class="arrow">
                                                @if (isset($item['section_active']))
                                                    <i class="fas fa-chevron-up"></i>
                                                @else
                                                    <i class="fas fa-chevron-down"></i>
                                                @endif
                                            </a>
                                            <ul class="inner"
                                                @if (isset($item['section_active'])) style="display: block" @endif>
                                                @foreach ($item['list'] as $inner)
                                                    <li><a  @if ($inner['active']) class="active" @endif
                                                        href="{{ $inner['url'] }}">{{ $inner['catalog_name'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- Список услуг по направлению END -->
                    @include('blocks.main_services')
                    @include('blocks.partner')
                </aside>
                <div class="content-inner">
                    @include($data['service_template'])
                    @include('blocks.advantages')
                    @include('blocks.areas')
                    @include('blocks.map')
                    @include('blocks.reviews_front')
                    @include('forms.consult')
                </div>
            </div>
        </div>
    </div>
@endsection
