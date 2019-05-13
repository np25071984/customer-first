@extends('admin.layouts.app')

@section('content')

    <a class="float-right mb-4" href="{{ route('admin.brand.create') }}"><button type="button" class="btn btn-primary">Создать</button></a>
    <table class="table">
        <thead>
            <th>Название производителя</th>
            <th class="text-center">Функции</th>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td> {{ $brand->name }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.brand.show', $brand->id) }}" class="btn btn-primary" role="button">
                                Показать
                            </a>
                            <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-primary" role="button">
                                Изменить
                            </a>
                        </div>
                        <form class="d-inline"
                              action="{{ route('admin.brand.destroy', $brand->id) }}"
                              method="POST"
                              onsubmit="return confirm('Вы уверены что хотите удалить запись?');">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Удалить"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $brands->links() }}

@endsection