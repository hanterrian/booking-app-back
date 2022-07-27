<div class="col-12 mt-4">
    <div class="row mb-4 form-floating">
        <div class="col-auto">
            <label for="category">{{ __('Category') }}</label>
            <select id="category" wire:model="category" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($categories as $key => $category)
                    <option value="{{ $key }}">{{ $category }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="tag">{{ __('Tag') }}</label>
            <select id="tag" wire:model="tag" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($tags as $key => $tag)
                    <option value="{{ $key }}">{{ $tag }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="publisher">{{ __('Publisher') }}</label>
            <select id="publisher" wire:model="publisher" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($publishers as $key => $publisher)
                    <option value="{{ $key }}">{{ $publisher }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label for="author">{{ __('Author') }}</label>
            <select id="author" wire:model="author" wire:change.prevent="filter" class="form-select">
                <option value="">{{ __('All') }}</option>
                @foreach($authors as $key => $author)
                    <option value="{{ $key }}">{{ $author }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            @if($filtered)
                <button wire:click.prefetch="resetFilter" class="btn btn-outline-info mt-4">{{ __('Reset filter') }}</button>
            @endif
        </div>
    </div>

    <div class="alert alert-info col-12" role="alert" wire:loading>
        <h4 class="alert-heading">{{ __('Searching') }}</h4>
        {{ __('It\'ll take some time') }}
    </div>

    <div class="row row-cols-sm-1 row-cols-md-3 row-cols-lg-5 gy-3" wire:loading.remove>
        @foreach($items as $item)
            <div class="col">
                <div class="card" style="height: 100%">
                    <img class="card-img-top" src="{{ $item->thumbnail }}" alt="{{ $item->title }}"/>
                    <div class="card-body">
                        <h2 class="card-title">{{ $item->title }}</h2>
                        <div class="pt-4 pb-2">
                            {{ __('Authors') }}:
                            @foreach($item->authors as $author)
                                <a class="badge text-bg-light" href="{{ route('author.index', ['author' => $author]) }}">
                                    {{ $author->name }}
                                </a>
                            @endforeach
                        </div>
                        <div class="pt-2 pb-2">
                            {{ __('Publisher') }}: <a class="badge text-bg-light" href="{{ route('publisher.index', ['publisher' => $item->publisher]) }}">
                                {{ $item->publisher->title }}
                            </a>
                        </div>
                        <div class="pt-2 pb-2">
                            {{ __('Category') }}: <a class="badge text-bg-light" href="{{ route('category.index', ['category' => $item->category]) }}">
                                {{ $item->category->title }}
                            </a>
                        </div>
                        <div class="pt-2 pb-2">
                            {{ __('Tags') }}:
                            @foreach($item->tags as $tag)
                                <a class="badge text-bg-light" href="{{ route('tag.index', ['tag' => $tag]) }}">
                                    {{ $tag->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <a class="btn btn-primary" href="{{ route('product.view', ['product' => $item]) }}">
                        {{ __('Read more') }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-3" wire:loading.remove>
        {{ $items->links() }}
    </div>
</div>
