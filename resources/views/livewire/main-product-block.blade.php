<div class="pt-6">
    <div class="grid grid-cols-5 gap-8">
        @foreach($items as $item)
            <div class="flex flex-col h-full box-border border-1 p-4 shadow-lg rounded-md">
                <div class="rounded-md w-full self-start">
                    <img class="max-h-full" src="{{ $item->thumbnail }}" alt="{{ $item->title }}"/>
                </div>
                <div class="self-start">
                    <div>
                        <h2 class="text-2xl">{{ $item->title }}</h2>
                    </div>
                    <div>
                        <div>
                            {{ __('Authors') }}:
                            @foreach($item->authors as $author)
                                {{ $loop->first ? '' : "," }}
                                <a class="underline" href="{{ route('author.index', ['author' => $author]) }}">{{ $author->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <div>{{ __('Publisher') }}: <a class="underline" href="{{ route('publisher.index', ['publisher' => $item->publisher]) }}">{{ $item->publisher->title }}</a></div>
                        <div>{{ __('Category') }}: <a class="underline" href="{{ route('category.index', ['category' => $item->category]) }}">{{ $item->category->title }}</a></div>
                    </div>
                    <div>
                        <div>
                            {{ __('Tags') }}:
                            @foreach($item->tags as $tag)
                                {{ $loop->first ? '' : "," }}
                                <a class="underline" href="{{ route('tag.index', ['tag' => $tag]) }}">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="self-end">
                    <a href="{{ route('book.view', ['book' => $item]) }}">{{ __('Read more') }}</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
