@extends('admin.layouts.app')

@section('content')

    <table class="table">
        <thead>
            <th>Название категории</th>
            <th class="text-center">Функции</th>
        </thead>
        <tbody>
            {{-- TODO: do it with recursion  --}}
            @foreach ($categories as $category)
                <tr>
                    <td> {{ $category->title }}</td>
                    <td class="text-center"><a target="_blank" href="{{ route('category.show', $category->slug->value) }}">Перейти</a></td>
                </tr>
                @if($category->children->count() > 0)
                    @foreach($category->children as $child)
                        <tr>
                            <td class="pl-5"> {{ $child->title }}</td>
                            <td class="text-center"><a target="_blank" href="{{ route('category.show', $child->slug->value) }}">Перейти</a></td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>

@endsection