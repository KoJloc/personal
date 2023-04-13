@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group" >
                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" placeholder="Название">
                    </div>
                    <div class="form-group" >
                        <input type="text" value="{{ old('tin') }}" name="tin" class="form-control" placeholder="ИНН">
                    </div>
                    <div class="form-group" >
                        <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group" >
                        <input type="text" value="{{ old('password') }}" name="password" class="form-control" placeholder="Пароль">
                    </div>
                    <div class="form-group" >
                        <input type="text" value="{{ old('password_confirmation') }}" name="password_confirmation" class="form-control" placeholder="Подтверждение пароля">
                    </div>
                    <div class="form-group" >
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection