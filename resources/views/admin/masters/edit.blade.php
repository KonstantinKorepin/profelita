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
                            <li class="breadcrumb-item active">Мастер {{ $master->last_name }} {{ $master->first_name }} {{ $master->middle_name }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Блок с основной информацией</h3>
                            </div>

                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('masters.update', ['master' => $master->id]) }}"
                                  method="post"
                                  enctype="multipart/form-data"
                            >
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="lastName">Фамилия *</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                               placeholder="Фамилия" value="{{ $master->last_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">Имя *</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                               placeholder="Имя" value="{{ $master->first_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="middleName">Отчество </label>
                                        <input type="text" class="form-control" id="middle_name" name="middle_name"
                                               placeholder="Отчество" value="{{ $master->middle_name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Фотография на профиль</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                       id="profile_file" name="profile_file">
                                                <label class="custom-file-label" for="profileFile">Выбрать файл</label>
                                            </div>
                                        </div>
                                        @if (($master->profileFile()->get()->first()))
                                            <div class="photo">
                                                <img width="20%" src="{{ asset('storage/' . $master->profileFile()->get()->first()->path) }}" class="avatar"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Фотография для списка</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input"
                                                       id="list_file" name="list_file">
                                                <label class="custom-file-label" for="listFile">Выбрать файл</label>
                                            </div>
                                        </div>
                                        @if ($master->listFile()->get()->first())
                                            <div class="photo">
                                                <img width="20%" src="{{ asset('storage/' . $master->listFile()->get()->first()->path) }}" class="avatar"
                                                     alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
