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

                        <h3>{{ $item->container->name }}</h3>
                        <h4>Бренд: {{ $item->container->brand->name }}</h4>
                        <p>{{ $item->name }}</p>
                        <p>{{ $item->article }}</p>
                        <p>{{ $item->price }}</p>
                        <hr />
                        @foreach ($item->container->items as $akin)
                            @if ($akin->id !== $item->id)
                                <p>{{ $akin->name }}</p>
                                <p>{{ $akin->article }}</p>
                                <p>{{ $akin->price }}</p>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection