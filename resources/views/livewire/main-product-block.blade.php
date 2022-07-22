<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach($items as $item)
            <div>
                <img src="{{ $item->thumbnail }}"/>
                <div>
                    <h2>{{ $item->title }}</h2>
                </div>
                <div>
                    <div>{{ __('Authors') }}</div>
                    <ul>
                        @foreach($item->authors as $author)
                            <li>
                                <a href="{{ route('author.index', ['author' => $author]) }}">{{ $author->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <div>{{ __('Publisher') }} <a href="{{ route('publisher.index', ['publisher' => $item->publisher]) }}">{{ $item->publisher->title }}</a></div>
                    <div>{{ __('Category') }} <a href="{{ route('category.index', ['category' => $item->category]) }}">{{ $item->category->title }}</a></div>
                </div>
                <div>
                    <div>{{ __('Tags') }}</div>
                    <ul>
                        @foreach($item->tags as $tag)
                            <li>
                                <a href="{{ route('tag.index', ['tag' => $tag]) }}">{{ $tag->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
