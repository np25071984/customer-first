@extends('admin.layouts.app')

@section('content')

    <h1>Создание нового контейнера</h1>
    <hr>
    <form action="{{ route('admin.container.store') }}" method="POST">

        {{ csrf_field() }}

        <div class="form-group required">
            <label for="name">Категория</label>
            <select name="category_id"
                    class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}">
                <option value="" disabled selected>Выберите категорию товара</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @foreach ($category->children as $child)
                        <option value="{{ $child->id }}">&nbsp;&nbsp;&nbsp;&nbsp;{{ $child->title }}</option>
                    @endforeach
                @endforeach
            </select>

            <div class="invalid-feedback">{{ $errors->first('category_id') }}</div>
        </div>

        <div class="form-group required">
            <label for="name">Производитель</label>
            <select name="brand_id"
                    class="form-control{{ $errors->has('brand_id') ? ' is-invalid' : '' }}">
                <option value="" disabled selected>Выберите производителя</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>

            <div class="invalid-feedback">{{ $errors->first('brand_id') }}</div>
        </div>

        <div class="form-group required">
            <label for="name">Название контейнера</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   required
                   value="{{ old('name') }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание контейнера</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ old('description') }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection
