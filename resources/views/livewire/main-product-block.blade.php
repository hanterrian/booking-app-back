<div>
    <div class="p-10">
    </div>
    <div class="px-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
        @foreach($items as $item)
            <div class="flex flex-col rounded overflow-hidden shadow-lg">
                <img class="w-full" src="{{ $item->thumbnail }}" alt="{{ $item->title }}"/>
                <div class="flex-grow px-6 py-4">
                    <h2 class="font-bold text-xl mb-2">{{ $item->title }}</h2>
                    <div class="pt-4 pb-2">
                        {{ __('Authors') }}:
                        @foreach($item->authors as $author)
                            <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('author.index', ['author' => $author]) }}">
                                {{ $author->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Publisher') }}: <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('publisher.index', ['publisher' => $item->publisher]) }}">
                            {{ $item->publisher->title }}
                        </a>
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Category') }}: <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('category.index', ['category' => $item->category]) }}">
                            {{ $item->category->title }}
                        </a>
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Tags') }}:
                        @foreach($item->tags as $tag)
                            <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="{{ route('tag.index', ['tag' => $tag]) }}">
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <a class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" href="{{ route('book.view', ['book' => $item]) }}">
                    {{ __('Read more') }}
                </a>
            </div>
        @endforeach
    </div>
</div>
