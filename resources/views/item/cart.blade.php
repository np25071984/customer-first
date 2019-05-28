<div class="card mb-3">
    <img class="card-img-top" src="{{ $item->getTopImageSrc(150, 150) }}" alt="Card image cap">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('item.show', $item->slug->value) }}">
                {{ $item->container->name }} {{ $item->name }}
            </a>
        </h5>
        <p class="card-text"><small class="text-muted">Артикл: {{ $item->article }}</small></p>
        <p class="card-text">{{ $item->description }}</p>
        <p class="card-text">{{ $item->price }} р.</p>
    </div>
    <div class="card-footer text-right">
        <a href="#" class="btn btn-primary">Купить</a>
    </div>
</div>
