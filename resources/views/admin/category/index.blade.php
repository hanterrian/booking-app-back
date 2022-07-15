@extends('admin.template')

@section('title', 'Category')

@section('content')
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead>
                <th>Title</th>
                <th>Slug</th>
                <th>Sort</th>
                <th>Published</th>
                </thead>

                <tbody>
                @foreach($items as $item)
                    <td>
                        {{ $item->title }}
                    </td>
                    <td>
                        {{ $item->slug }}
                    </td>
                    <td>
                        {{ $item->sort }}
                    </td>
                    <td>
                        {{ format_bool($item->published) }}
                    </td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
