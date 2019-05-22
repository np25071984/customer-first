@extends('admin.layouts.app')

@section('content')

    <h1>Просмотр товара</h1>
    <hr>
    <div class="row">
        <div class="col-4 text-right">
            <strong>Название контейнера</strong>
        </div>
        <div class="col-8">{{ $item->container->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Название бренда</strong>
        </div>
        <div class="col-8">{{ $item->container->brand->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Название категории</strong>
        </div>
        <div class="col-8">{{ $item->container->category->title }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Артикл</strong>
        </div>
        <div class="col-8">{{ $item->article }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Название</strong>
        </div>
        <div class="col-8">{{ $item->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Описание</strong>
        </div>
        <div class="col-8">{{ $item->description }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Цена</strong>
        </div>
        <div class="col-8">{{ $item->price }}</div>
    </div>

    @foreach ($item->images as $image)
        <img src="/img/{{ $item->id }}/{{ $image->src }}" /><br /><br />
    @endforeach

    <div class="float-right">
        <a href="{{ route('admin.item.edit', $item->id) }}" class="btn btn-primary" role="button">
            Изменить
        </a>

        <form class="d-inline"
              action="{{ route('admin.item.destroy', $item->id) }}"
              method="POST"
              onsubmit="return confirm('Вы уверены что хотите удалить запись?');">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-danger" value="Удалить"/>
        </form>
    </div>

@endsection