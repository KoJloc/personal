@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать пользователя</h1>
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
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="form-group" >
                        <input type="text" name="name" value="{{ $user->name ?? old('name') }}" class="form-control" placeholder="Название">
                    </div>
                    <div class="form-group" >
                        <input type="text" name="tin" value="{{ $user->tin ?? old('tin') }}" class="form-control" placeholder="ИНН">
                    </div>
                    <div class="form-group" >
                        <input type="text" name="address" value="{{ $user->address ?? old('address') }}" class="form-control" placeholder="<Юр. адрес>">
                    </div>
                    <div class="form-group" >
                        <input type="text" name="type" value="{{ $user->type ?? old('type') }}" class="form-control" placeholder="Тип услуг">
                    </div>
                    <div class="form-group" >
                        <input type="text" name="age" value="{{ $user->age ?? old('age') }}" class="form-control" placeholder="Лет на рынке">
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