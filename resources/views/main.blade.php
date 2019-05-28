@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-deck">
            @foreach ($items as $key => $item)
                    @if ($key%5 === 0)
                        </div><div class="card-deck">
                    @endif

                    @component('item.cart', ['item' => $item])
                    @endcomponent

            @endforeach
        </div>
    </div>
@endsection
