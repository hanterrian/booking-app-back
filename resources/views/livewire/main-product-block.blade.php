<div>
    <div class="p-10 flex flex-row">
        <div class="self-start pr-4">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('Category') }}</label>
            <select id="category" wire:model="category" wire:change.prevent="filter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">{{ __('All') }}</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="self-start pr-4">
            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('Tag') }}</label>
            <select id="tag" wire:model="tag" wire:change.prevent="filter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">{{ __('All') }}</option>
                @foreach($tags as $key => $tag)
                    <option value="{{ $key }}">{{ $tag }}</option>
                @endforeach
            </select>
        </div>
        <div class="self-start pr-4">
            <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('Publisher') }}</label>
            <select id="publisher" wire:model="publisher" wire:change.prevent="filter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">{{ __('All') }}</option>
                @foreach($publishers as $key => $publisher)
                    <option value="{{ $key }}">{{ $publisher }}</option>
                @endforeach
            </select>
        </div>
        <div class="self-start pr-4">
            <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('Author') }}</label>
            <select id="author" wire:model="author" wire:change.prevent="filter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">{{ __('All') }}</option>
                @foreach($authors as $key => $author)
                    <option value="{{ $key }}">{{ $author }}</option>
                @endforeach
            </select>
        </div>
        <div class="self-end">
            @if($filtered)
                <button wire:click.prefetch="resetFilter" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2.5 px-4 rounded inline-flex items-center">{{ __('Reset filter') }}</button>
            @endif
        </div>
    </div>

    <div class="px-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5" wire:loading.remove>
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
    <div class="p-10 flex flex-row">
        {{ $items->links() }}
    </div>
</div>
