@extends('admin.layouts.app')

@section('content')

    <p>
        <strong>Название бренда:</strong> {{ $brand->name }}
    </p>
    <p>
        <strong>Описание:</strong> {{ $brand->description }}
    </p>

@endsection