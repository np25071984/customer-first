@extends('admin.layouts.app')

@section('content')

    <h1>Редактирование бренда</h1>
    <hr>
    <form action="{{ route('admin.item.update', $item->id)}}" method="POST">

        <input type="hidden" name="_method" value="PUT">

        {{ csrf_field() }}

        <div class="form-group required">
            <label for="name">Артикл</label>
            <input type="text"
                   class="form-control{{ $errors->has('article') ? ' is-invalid' : '' }}"
                   name="article"
                   required
                   value="{{ $item->article }}">

            <div class="invalid-feedback">{{ $errors->first('article') }}</div>
        </div>

        <div class="form-group required">
            <label for="name">Название</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   required
                   value="{{ $item->name }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ $item->description }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group">
            <label for="name">Цена</label>
            <input type="text"
                   class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                   name="price"
                   required
                   value="{{ $item->price }}">

            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Изменить</button>
    </form>

@endsection
