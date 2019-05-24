@extends('admin.layouts.app')

@section('content')

    <h1>Редактирование бренда</h1>
    <hr>
    <form action="{{ route('admin.item.update', $item->id)}}" method="POST" enctype="multipart/form-data">

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

        <div class="form-group">
            <label for="name">Изображения</label>
            <div>
                <div id="images">
                    @foreach ($item->images as $id => $image)
                        <div class="mb-4" id="image-{{ $id + 1 }}">
                            <img src="{{ $image->getSrc(250, 250) }}" /><br />
                            <a href="#" onclick="window.removeExistedImage(this, {{ $image->id }}); return false;">Удалить</a>
                        </div>
                    @endforeach
                </div>
                <button class="btn btn-primary" onclick="window.addImage('images'); return false;">Добавить</button>
            </div>

            <div class="invalid-feedback">{{ $errors->first('price') }}</div>
        </div>

        <button type="submit" class="btn btn-primary float-right">Изменить</button>
    </form>

@endsection
