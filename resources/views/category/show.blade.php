@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4>Категория: {{ $category->title }}</h4>
                        @foreach ($category->containers as $container)
                            <h3>Линейка: {{ $container->name }}</h3>
                            <div class="ml-4">
                                @foreach ($container->items as $item)
                                    <p>{{ $item->name }}</p>
                                    <p>{{ $item->article }}</p>
                                    <p>{{ $item->price }}</p>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection