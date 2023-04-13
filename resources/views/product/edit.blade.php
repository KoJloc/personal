@extends('layouts.main')
<script>
    import bsCustomFileInput from 'bs-custom-file-input'

    $(document).ready(function () {
        bsCustomFileInput.init()
    })
</script>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактировать компанию</h1>
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
                <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <input type="text" name="title" value="{{ $product->title }}" class="form-control"
                               placeholder="Наименование">
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" value="{{ $product->description }}" class="form-control"
                               placeholder="Описание">
                    </div>
                    <div class="form-group">
                        <input type="text" name="content" value="{{ $product->content }}" class="form-control"
                               placeholder="Дополнительно">
                    </div>
                    <div class="form-group">
                        <select name="categories_id" class="form-control select2" class="categories"
                                data-placeholder="Категории" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Тэги"
                                style="width: 100%;">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input"
                                       id="exampleInputFile1">
                                <label class="custom-file-label" for="exampleInputFile1">Выберите 1
                                    изображение...</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input"
                                       id="exampleInputFile1">
                                <label class="custom-file-label" for="exampleInputFile1">Выберите 2
                                    изображение...</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input"
                                       id="exampleInputFile1">
                                <label class="custom-file-label" for="exampleInputFile1">Выберите 3
                                    изображение...</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input"
                                       id="exampleInputFile1">
                                <label class="custom-file-label" for="exampleInputFile1">Выберите 4
                                    изображение...</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="product_images[]" type="file" class="custom-file-input"
                                       id="exampleInputFile1">
                                <label class="custom-file-label" for="exampleInputFile1">Выберите 5
                                    изображение...</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection