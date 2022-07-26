<div class="col-12">
    <div class="row mb-4">
        <div class="col-auto">
            <label for="category" class="form-label">{{ __('Category') }}</label>
            <select id="category" wire:model="category" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="tag" class="form-label">{{ __('Tag') }}</label>
            <select id="tag" wire:model="tag" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($tags as $key => $tag)
                    <option value="{{ $key }}">{{ $tag }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="publisher" class="form-label">{{ __('Publisher') }}</label>
            <select id="publisher" wire:model="publisher" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($publishers as $key => $publisher)
                    <option value="{{ $key }}">{{ $publisher }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="author" class="form-label">{{ __('Author') }}</label>
            <select id="author" wire:model="author" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($authors as $key => $author)
                    <option value="{{ $key }}">{{ $author }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @if($filtered)
                <button wire:click.prefetch="resetFilter" class="btn btn-outline-light">{{ __('Reset filter') }}</button>
            @endif
        </div>
    </div>

    <div class="p-4 px-10 w-full mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert" wire:loading>
        <span class="font-medium">{{ __('Searching') }}</span> {{ __('It\'ll take some time') }}
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
                            <a class="book-babel" href="{{ route('author.index', ['author' => $author]) }}">
                                {{ $author->name }}
                            </a>
                        @endforeach
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Publisher') }}: <a class="book-babel" href="{{ route('publisher.index', ['publisher' => $item->publisher]) }}">
                            {{ $item->publisher->title }}
                        </a>
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Category') }}: <a class="book-babel" href="{{ route('category.index', ['category' => $item->category]) }}">
                            {{ $item->category->title }}
                        </a>
                    </div>
                    <div class="pt-2 pb-2">
                        {{ __('Tags') }}:
                        @foreach($item->tags as $tag)
                            <a class="book-babel" href="{{ route('tag.index', ['tag' => $tag]) }}">
                                {{ $tag->title }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <a class="w-full bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center" href="{{ route('product.view', ['product' => $item]) }}">
                    {{ __('Read more') }}
                </a>
            </div>
        @endforeach
    </div>
    <div class="p-10 flex flex-row" wire:loading.remove>
        {{ $items->links() }}
    </div>
</div>
