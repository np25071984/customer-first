@extends('admin.layouts.app')

@section('content')
    <h1>Создание нового товара</h1>
    <hr>
    <form action="{{ route('admin.item.store') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <input type="hidden" name="container_id" value="{{ $container->id }}" />

        <div class="form-group required">
            <label for="name">Артикл</label>
            <input type="text"
                   class="form-control{{ $errors->has('article') ? ' is-invalid' : '' }}"
                   name="article"
                   required
                   value="{{ old('article') }}">

            <div class="invalid-feedback">{{ $errors->first('article') }}</div>
        </div>

        <div class="form-group required">
            <label for="name">Название</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   required
                   value="{{ old('name') }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ old('description') }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group">
            <label for="name">Цена</label>
            <input type="text"
                   class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                   name="price"
                   required
                   value="{{ old('price') }}">

            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
        </div>

        <div class="form-group">
            <label for="name">Иозображения</label>
            <div>
                <div id="images">

                </div>
                <button class="btn btn-primary" onclick="window.addImage('images'); return false;">Добавить</button>
            </div>

            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection
