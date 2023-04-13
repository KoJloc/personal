@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Компании</h1>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('product.create') }}" class="btn btn-primary">Добавить</a>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Описание</th>
                                    <th>Дополнительно</th>
                                    <th>Категория</th>
                                    <th>Теги</th>
                                    <th>Картинки</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td><a href="{{route('product.show', $product->id)}}">{{ $product->title }}</a></td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->content }}</td>
                                        <td>
                                            @foreach($categories as $category)
                                                @if($category->id == $product->category_id)
                                                    {{$category->title}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($tags as $tag)
                                                @foreach($productsTags as $productTag)
                                                    @if($productTag->tag_id == $tag->id && $productTag->product_id == $product->id)
                                                        {{$tag->title}} <br>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </td>
                                        <td>
                                        @foreach($productsImages as $productImage)
                                            @if($productImage->product_id == $product->id)
                                               {{$productImage->file_path}} <br>
                                            @endif
                                        @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection