@extends('layouts.app')

@section('content')
    <div class="flex flex-row mt-10 rounded overflow-hidden shadow-lg">
        <div class="basis-1/3 p-4">
            <img class="w-full" src="{{ $product->thumbnail }}" alt="{{ $product->title }}"/>
        </div>
        <div class="basis-2/3 flex-col p-4">
            <h1 class="font-bold text-2xl mb-2">{{ $product->title }}</h1>
            <div>
                {{ __('Authors') }}:
                @foreach($product->authors as $author)
                    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('author.index', ['author' => $author]) }}">
                        {{ $author->name }}
                    </a>
                @endforeach
            </div>
            <div>
                {{ __('Publisher') }}: <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('publisher.index', ['publisher' => $product->publisher]) }}">
                    {{ $product->publisher->title }}
                </a>
            </div>
            <div>
                {{ __('Category') }}: <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('category.index', ['category' => $product->category]) }}">
                    {{ $product->category->title }}
                </a>
            </div>
            <div>
                {{ __('Tags') }}:
                @foreach($product->tags as $tag)
                    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('tag.index', ['tag' => $tag]) }}">
                        {{ $tag->title }}
                    </a>
                @endforeach
            </div>
            <div class="text-xl mt-2">
                {{ $product->description }}
            </div>
        </div>
    </div>
@endsection
