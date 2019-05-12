@extends('admin.layouts.app')

@section('content')

    <h1>Редактирование бренда</h1>
    <hr>
    <form action="{{ route('brand.update', $brand->id)}}" method="POST">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название бренда</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   value="{{ $brand->name }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            <label for="description">Описание бренда</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ $brand->description }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Изменить</button>
    </form>

@endsection