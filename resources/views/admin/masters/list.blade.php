@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Мастера</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Мастера</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Мастера</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if (count($masters))
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 1%">
                                    Id
                                </th>
                                <th style="width: 20%">
                                    Ф.И.О.
                                </th>
                                <th style="width: 30%">
                                    Специализация, город
                                </th>
                                <th class="text-center">
                                    Статус
                                </th>
                                <th>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($masters as $key => $master)
                                <tr>
                                    <td>
                                        {{ $master->id }}
                                    </td>
                                    <td>
                                        <a href="{{ route('masters.edit', ['master' => $master->id]) }}">
                                            {{ $master->last_name }} {{ $master->first_name }} {{ $master->middle_name }}
                                        </a>
                                        <br>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                {{ $master->sp_name }},
                                            </li>
                                            <li class="list-inline-item">
                                                {{ $master->city_name }}
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-state">
                                        @if ($master->actual)
                                            <span class="badge badge-success">Активный</span>
                                        @else
                                            <span class="badge badge-danger">Не активный</span>
                                        @endif
                                    </td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('masters.edit', ['master' => $master->id]) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактирование
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $masters->links('admin.vendor.pagination.custom') }}
                    @else
                        Данных о мастерах пока нет...
                    @endif
                </div>

            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
