@extends('admin.layouts.app')

@section('content')

    <h1>Просмотр бренда</h1>
    <hr>
    <div class="row">
        <div class="col-4 text-right">
            <strong>Название бренда</strong>
        </div>
        <div class="col-8">{{ $brand->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Описание</strong>
        </div>
        <div class="col-8">{{ $brand->description }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Логотип</strong>
        </div>
        <div class="col-8">
            @if ($brand->logo)
                <img src="{{ $brand->getLogoSrc(300, 300) }}" />
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>URL</strong>
        </div>
        <div class="col-8">
            <a target="_blank"
               href="{{ route('brand.show', $brand->slug->value) }}">{{ route('brand.show', $brand->slug->value) }}</a>
        </div>
    </div>

    <div class="float-right">
        <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-primary" role="button">
            Изменить
        </a>

        <form class="d-inline"
              action="{{ route('admin.brand.destroy', $brand->id) }}"
              method="POST"
              onsubmit="return confirm('Вы уверены что хотите удалить запись?');">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-danger" value="Удалить"/>
        </form>
    </div>

@endsection