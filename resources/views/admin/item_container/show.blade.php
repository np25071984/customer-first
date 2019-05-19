@extends('admin.layouts.app')

@section('content')

    <h1>Просмотр контейнера</h1>
    <hr>
    <div class="row">
        <div class="col-4 text-right">
            <strong>Название контейнера</strong>
        </div>
        <div class="col-8">{{ $container->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Название бренда</strong>
        </div>
        <div class="col-8">{{ $container->brand->name }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Название категории</strong>
        </div>
        <div class="col-8">{{ $container->category->title }}</div>
    </div>

    <div class="row">
        <div class="col-4 text-right">
            <strong>Описание</strong>
        </div>
        <div class="col-8">{{ $container->description }}</div>
    </div>

    <div class="float-right">
        <a href="{{ route('admin.container.edit', $container->id) }}" class="btn btn-primary" role="button">
            Изменить
        </a>

        <form class="d-inline"
              action="{{ route('admin.container.destroy', $container->id) }}"
              method="POST"
              onsubmit="return confirm('Вы уверены что хотите удалить запись?');">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-danger" value="Удалить"/>
        </form>
    </div>

@endsection