@extends('admin.layouts.app')

@section('content')

    <h1>Создание нового бренда</h1>
    <hr>
    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="form-group required">
            <label for="name">Название бренда</label>
            <input type="text"
                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   name="name"
                   required
                   value="{{ old('name') }}">

            <div class="invalid-feedback">{{ $errors->first('name') }}</div>
        </div>

        <div class="form-group">
            <label for="description">Описание бренда</label>
            <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                      name="description">{{ old('description') }}</textarea>

            <div class="invalid-feedback">{{ $errors->first('description') }}</div>
        </div>

        <div class="form-group required">
            <label for="slug">Slug</label>
            <input type="text"
                   class="form-control{{ $errors->has('slug') ? ' is-invalid' : '' }}"
                   name="slug"
                   value="{{ old('slug') }}">

            <div class="invalid-feedback">{{ $errors->first('slug') }}</div>
        </div>

        <div class="form-group">
            <label for="logo">Логотип</label>
            <div>
                <input type="text" name="filename" id="filename" class="form-control mb-3 d-none" />
                <img id="preview" width="300px" height="300px" class="img-fluid" src="/img/noimage-300x300.jpeg" />
                <input type="file" name="logo" id="logo" class="d-none" onChange="window.refreshLogo(this)" />
                <br/>
                <a href="javascript:window.changeLogo();">Изменить</a> |
                <a class="text-danger" href="javascript:window.removeLogo()">Удалить</a>

                @if ($errors->has('logo'))
                    <div class="invalid-feedback d-block">{{ $errors->first('logo') }}</div>
                @elseif ($errors->has('filename'))
                    <div class="invalid-feedback d-block">{{ $errors->first('filename') }}</div>
                @endif
            </div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Создать</button>
    </form>
@endsection
