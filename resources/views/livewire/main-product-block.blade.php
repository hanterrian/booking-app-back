<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($items as $item)
            <div>
                <img src="{{ $item->thumbnail }}" alt="{{ $item->title }}"/>
                <div>
                    <h2>{{ $item->title }}</h2>
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
        @endforeach
    </div>
</div>
