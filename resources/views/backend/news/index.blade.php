@extends ('layouts.app') @section('content')
    <a class="btn btn-primary" href="{{ route('admin.news.create') }}">create</a>

    <table class="table table-light">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">title</th>
                <th scope="col">description</th>
                <th scope="col">content</th>
                <th scope="col">image_id</th>
                <th scope="col">created_by</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($listNews))
                @foreach ($listNews as $news)
                    <tr>
                        <th scope="row">
                            {{ $loop->iteration }}
                        </th>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->description }}</td>
                        <td>{{ $news->content }}</td>
                        <td>{{ $news->image_id }}</td>
                        <td>{{ $news->created_by }}</td>
                        <td>
                            <a href="{{ route('admin.news.show', ['news' => $news]) }}">view</a>
                            <a href="{{ route('admin.news.edit', ['news' => $news]) }}">edit</a>
                            <a href="{{ route('admin.news.destroy', ['news' => $news]) }}">delete</a>

                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
@endsection
