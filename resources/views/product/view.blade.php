@extends('layouts.app')

@section('content')
    <div class="book-page">
        <div class="book-img">
            <img class="w-full" src="{{ $product->thumbnail }}" alt="{{ $product->title }}"/>
        </div>
        <div class="book-block">
            <h1 class="book-title">{{ $product->title }}</h1>
            <div>
                {{ __('Authors') }}:
                @foreach($product->authors as $author)
                    <a class="book-babel" href="{{ route('author.index', ['author' => $author]) }}">
                        {{ $author->name }}
                    </a>
                @endforeach
            </div>
            <div>
                {{ __('Publisher') }}: <a class="book-babel" href="{{ route('publisher.index', ['publisher' => $product->publisher]) }}">
                    {{ $product->publisher->title }}
                </a>
            </div>
            <div>
                {{ __('Category') }}: <a class="book-babel" href="{{ route('category.index', ['category' => $product->category]) }}">
                    {{ $product->category->title }}
                </a>
            </div>
            <div>
                {{ __('Tags') }}:
                @foreach($product->tags as $tag)
                    <a class="book-babel" href="{{ route('tag.index', ['tag' => $tag]) }}">
                        {{ $tag->title }}
                    </a>
                @endforeach
            </div>
            <div class="book-description">
                {{ $product->description }}
            </div>
        </div>
    </div>
@endsection
