@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                        @foreach ($categories as $category)
                            <li><a href="{{ route('category.show', $category->slug->slug) }}">{{ $category->title }}</a>
                                @if($category->children->count() > 0)
                                    <ul>
                                    @foreach($category->children as $child)
                                        <li><a href="{{ route('category.show', $child->slug->slug) }}">{{ $child->title }}</a></li>
                                    @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        </ul>

                    </div>

                    <div class="card-footer">
                        <a href="{{ route('admin.dashboard') }}">Назад</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection