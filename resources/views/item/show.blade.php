@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>{{ $item->container->name }} {{ $item->name }}</h2>

        <div>
            @if (count($item->images))
                @foreach ($item->images as $image)
                    <img src="{{ $image->getSrc(300, 300) }}"/>
                @endforeach
            @else
                <img src="{{ $item->getTopImageSrc(300, 300) }}"/>
            @endif

            <h3>Контейнер: {{ $item->container->name }}</h3>
            <h4>Бренд: {{ $item->container->brand->name }}</h4>
            <p>Название: {{ $item->name }}</p>
            <p>Артикул: {{ $item->article }}</p>
            <p>Цена: {{ $item->price }}</p>
            <p>Описание: {{ $item->description }}</p>
        </div>

        <table class="table">
            <thead>
                <th>Изображение</th>
                <th>Название</th>
                <th class="text-center">Цена</th>
            </thead>
            <tbody>
            @foreach ($item->container->items as $akin)
                @if ($akin->id === $item->id)
                    @continue
                @endif

                <tr>
                    <td><img src="{{ $akin->getTopImageSrc(50, 50) }}" /></td>
                    <td><a href="{{ route('item.show', $akin->slug->value) }}">{{ $akin->container->name }} {{ $akin->name }}</a></td>
                    <td class="text-center">{{ $akin->price }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection